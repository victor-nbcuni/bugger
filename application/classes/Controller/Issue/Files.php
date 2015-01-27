<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Files extends Controller_Auth_User {
    /**
     * @uses    ajax
     * @return  json
     */
    public function action_upload()
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

            try {
                // Save the file
                Model_Issue_File::processUpload($file, $issue_id, $this->auth_user->id);
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

    /**
     * @uses    ajax
     * @return  json
     */
    public function action_remove()
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
    public function action_upload_temp()
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
                $base_temp_path = APP_UPLOAD_TMP_PATH . $temp_dir . '/';
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

    public function action_remove_temp()
    {
        $post = $this->request->post();

        if ( ! isset($post['filename'], $post['dir']))
            return $this->response->badRequest('Invalid file');
        
        try {     
            unlink(APP_UPLOAD_TMP_PATH . $post['dir'] . '/' . $post['filename']);
        }
        catch(Exception $ex) {
            $this->log->add(Log::ERROR, $ex->getMessage());
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
        // Check file size (4 MB limit)
        if ($file['size'] > Model_Issue_File::MAX_UPLOAD_FILESIZE)
            return $this->response->badRequest('Invalid file size');

        // Check file type, only allow JPG, PNG, JPEG and GIF.
        $filetype = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if ( ! in_array($filetype, array('jpg', 'png', 'jpeg', 'gif')))
            return $this->response->badRequest('Invalid file type');

        return TRUE;
    }
}