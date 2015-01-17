<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issues extends Controller_Abstract_Member {
    /**
     * Displays ALL issues.
     */
    public function action_index()
    {
        $issues = Model_Issue::findAll();

        $this->template->content = $view = View::factory('issues/index');

        $view->title = 'All Tickets';
        $view->subtitle = 'View and Manage All Tickets';

        $view->statuses = ORM::factory('Issue_Status')->find_all();
        $view->priorities = ORM::factory('Issue_Priority')->find_all();
        $view->types = ORM::factory('Issue_Type')->find_all();
        $view->projects = ORM::factory('Project')->find_all();
    }

    /**
     * Returns a filtered issues table.
     *
     * @uses    AJAX
     * @return  HTML
     */
    public function action_filter()
    {
        if ($this->request->method() == Request::POST) {
            $this->auto_render = TRUE;
            $valid_filters = array('priority_id', 'project_id', 'type_id', 'status_id', 'reporter_user_id');
            $post = $this->request->post();

            $issues = ORM::factory('Issue');

            foreach($post as $filter => $values) {
                if (in_array($filter, $valid_filters)) {
                    $issues->where($filter, 'IN', $values);
                }
            }

            $issues = $issues->find_all();

            $this->template = View::factory('issues/_index_table')
                ->set('issues', $issues);           
        }
    }

    /**
     * Displays ALL issues REPORTED by ME.
     */
    public function action_reported_by_me()
    {
        $this->action_index();

        $this->template->content->title = 'Reported by Me';
        $this->template->content->subtitle = 'View and Manage Tickets Reported by You';
    }

    public function action_view()
    {
        $id = $this->request->param('id');
        $issue = ORM::factory('Issue', $id);
        
        if ( ! $issue->loaded()) {
            $this->session->flashError('generic.read_fail');
            $this->redirect('issues');
        }
            
        $comments = $issue->comments
            ->order_by('created_at', 'DESC')
            ->offset(0)
            ->limit(5)
            ->find_all();

        $this->template->content = View::factory('issues/view')
            ->set('issue', $issue)
            ->set('auth_user', $this->auth_user)
            ->set('comments', $comments);               
    }

    public function action_new()
    {
        $issue = ORM::factory('Issue');

        if ($post = $this->request->post()) {
            $post['issue']['status_id'] = Model_Issue_Status::OPEN;
            $post['issue']['reporter_user_id'] = $this->auth_user->id;
            $post['issue']['due_date'] = empty($post['issue']['due_date']) ? NULL : date('Y-m-d', strtotime($post['issue']['due_date']));
            $post['issue']['due_time'] = empty($post['issue']['due_time']) ? NULL : date('H:i:s', strtotime($post['issue']['due_time']));

            // Assign support requests to DEV
            if ($post['issue']['type_id'] == Model_Issue_Type::SUPPORT_REQUEST) {
                $post['issue']['assigned_department_id'] == Model_Department::DEV;
            }

            $issue->values($post['issue'])->save();

            try {
                Model_Issue_File::processUploadedTempFiles($post['attachment_temp_dir'], $issue->id, $this->auth_user->id);
            }
            catch(Exception $ex) {
                $this->log->add(Log::ERROR, $ex->getMessage());
                return $this->session->flashError('Error: ' . $ex->getMessage());
            }
       
            $this->redirect('issues/view/' . $issue->id);
        }

        $this->template->content = View::factory('issues/form')
            ->set('issue', $issue)
            ->set('attachment_temp_dir', time());
    }

    /**
     * @uses    ajax
     * @return  json
     */
    public function action_update_editable_field()
    {
        if ($post = $this->request->post()) {
            $issue = ORM::factory('Issue', $post['pk']);

            if ( ! $issue->loaded())
                return $this->response->notFound('Invalid ticket ID');

            // Update record
            $issue->set($post['name'], $post['value'])->save();

            // Log update in the comments
            $this->_logUpdate($post['name'], $issue);
        }
        else {
            $this->response->badRequest();
        }
    }

    /**
     * @uses    ajax
     * @return  json
     */
    public function action_upload_attachment()
    {
        if (isset($_FILES['file'])) {
            $issue_id = $this->request->param('id');

            if ( ! is_numeric($issue_id))
                return $this->response->badRequest('Invalid ticket ID');

            $file = $_FILES['file'];

            // Validate file
            $validation = $this->_validateAttachment($file);
            if ($validation !== TRUE)
                return $validation;

            // Save the file
            try {
                Model_Issue_File::processUploadedFile($file, $issue_id, $this->auth_user->id);
            }
            catch(Exception $ex) {
                $this->log->add(Log::ERROR, $ex->getMessage());
                return $this->response->serverError('Error: ' . $ex->getMessage());
            }
        }
        else {
            $this->response->badRequest();
        }
    }

    public function action_remove_attachment()
    {
        $issue_id = $this->request->param('id');
        $file_id = $this->request->query('file_id');

        if ( ! is_numeric($file_id) || ! is_numeric($issue_id)) {
            $this->response->badRequest('Invalid file or ticket ID');
        }
        else {
            try {
                Model_Issue_File::removeFile($file_id);
            }
            catch(Exception $ex) {
                $this->log->add(Log::ERROR, $ex->getMessage());
                $this->response->serverError('Error: ' . $ex->getMessage());
            }
        }
    }

    /**
     * @uses    ajax
     * @return  json
     */
    public function action_upload_temp_attachment()
    {
        if (isset($_FILES['file'])) {
            $temp_dir = $this->request->param('id');

            if (empty($temp_dir))
                return $this->response->badRequest('Invalid directory');

            $file = $_FILES['file'];

            // Validate file
            $validation = $this->_validateAttachment($file);
            if ($validation !== TRUE)
                return $validation;

            try {
                // Save the file
                $base_temp_path = UPLOAD_TMP_PATH . $temp_dir . '/';
                $temp_path = $base_temp_path . $file['name'];

                // Create dir if doesn't exist
                if ( ! file_exists($base_temp_path))
                    mkdir($base_temp_path, 0777);

                // Save file
                //if (file_exists($temp_path))
                //    unlink($temp_path);

                move_uploaded_file($file['tmp_name'], $temp_path); 
            }
            catch(Exception $ex) {
                $this->log->add(Log::ERROR, $ex->getMessage());
                return $this->response->serverError('Error: ' . $ex->getMessage());
            }
        }
        else {
            $this->response->badRequest();
        }
    }

    public function action_remove_temp_attachment()
    {
        $post = $this->request->post();

        if ( ! isset($post['filename'], $post['dir']))
            return $this->response->badRequest('Invalid file');
        
        try {     
            unlink(UPLOAD_TMP_PATH . $post['dir'] . '/' . $post['filename']);
        }
        catch(Exception $ex) {
            Log::instance()->add(Log::ERROR, $ex->getMessage());
            $this->response->serverError('Error: ' . $ex->getMessage());
        }
    }

    /**
     * Checks an uploaded file to make sure the size and file type is valid.
     *
     * @param   array             $file   The file data
     * @return  Response|TRUE
     */
    private function _validateAttachment($file)
    {
        // Check file size (4 MB max)
        if ($file['size'] > Model_Issue_File::MAX_UPLOAD_FILESIZE)
            return $this->response->badRequest('Invalid file size');

        // Check file type, only allow JPG, PNG, JPEG and GIF.
        $filetype = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if ( ! in_array($filetype, array('jpg', 'png', 'jpeg', 'gif')))
            return $this->response->badRequest('Invalid file type');

        return TRUE;
    }

    /**
     * Logs updates in the comments table.
     *
     * @param   string        $column               The updated column name
     * @param   Model_Issue   $issue                The updated issue
     * @see     action_update_editable_field()
     */
    private function _logUpdate($column, Model_Issue $issue)
    {
        switch($column) {
            case 'type_id':
            case 'status_id':
            case 'priority_id':
                $property = str_replace('_id', '', $column);
                $comment = sprintf('Changed %s to "%s"', $property, $issue->$property->name);
                break;   
            case 'assigned_department_id':
                $comment = sprintf('Changed assignee to "%s"', $issue->assigned_department->name);
                break;
        }
               
        if (isset($comment)) {
            ORM::factory('Issue_Comment')
                ->values(array(
                    'user_id' => $this->auth_user->id, 
                    'issue_id' => $issue->id, 
                    'comment' => $comment
                ))
                ->save();
        }
    }
}