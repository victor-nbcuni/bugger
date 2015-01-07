<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issues extends Controller_Abstract_Member {

    public function action_index()
    {
        $issues = ORM::factory('Issue')
            ->where('type_id', '<>', Model_Issue_Type::SUPPORT_REQUEST)
            ->find_all();
        $this->template->content = View::factory('issues/index')->set('issues', $issues);
    }

    public function action_view()
    {
        $id = $this->request->param('id');
        $issue = ORM::factory('Issue', $id);
        
        if ( ! $issue->loaded()) {
            $this->session->flashError('generic.read_fail');
            $this->redirect('issues');
        }
            
        $this->template->content = View::factory('issues/view')->set('issue', $issue);
    }

    public function action_new()
    {
        $issue = ORM::factory('Issue');

        if ($post = $this->request->post()) {
            $post['issue']['status_id'] = Model_Issue_Status::OPEN;
            $issue->values($post['issue'])->save();
            $this->redirect('issues');
        }

        $this->template->content = View::factory('issues/form')
            ->set('issue', $issue);
    }

    public function action_edit()
    {
        $id = $this->request->param('id');

        $issue = ORM::factory('Issue', $id);

        if ( ! $issue->loaded())  {
            $this->session->flashError('generic.read_fail');
            $this->redirect('issues');
        }
        
        if ($post = $this->request->post()) {
            $issue->values($post['issue'])->save();
            $this->redirect('issues');
        }

        $this->template->content = View::factory('issues/form')
            ->set('issue', $issue);
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
                return $this->response->notFound('Invalid Issue ID');

            // Update issue record
            $issue->set($post['name'], $post['value'])->save();

            // Log update in the comments
            $this->_logUpdate($post['name'], $issue);
        }
        else {
            $this->response->badRequest();
        }
    }

    /**
     * Logs update in the comments table
     *
     * @param string        $column     The updated column name
     * @param Model_Issue   $issue      The updated issue
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