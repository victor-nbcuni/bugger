<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Abstract class used as the parent of all member restricted controllers.
 */
abstract class Controller_Auth_User extends Controller_Template {
    public $template = 'layouts/default';
    public $auth;
    public $auth_user;
    public $session;
    public $log;

    public function before()
    {
        parent::before();

        $this->auth = Auth::instance();

        if ( ! $this->auth->logged_in())
            $this->redirect('login');

        $this->_checkToken();

        if ($this->request->is_ajax()) {
            $this->auto_render = FALSE;
        }

        $this->session = Session::instance();
        $this->auth_user = $this->auth->get_user();
        $this->log = Log::instance();

        $this->template->auth_user = $this->auth_user;
        $this->template->request = $this->request;
        $this->template->auth = $this->auth;
        $this->template->session = $this->session;
    }

    /**
     * Checks requests against CSRF (Cross-Site Request Forgery)
     */
    private function _checkToken()
    {
        $session = Session::instance();

        // Only check on POST and DELETE requests
        if ($this->request->method() == Request::POST || $this->request->action() == 'delete') {     
            $token = isset($_REQUEST['_token']) ? $_REQUEST['_token'] : NULL;
            if ($token != $session->getToken()) {
                // We have an invalid token
                if ($this->request->is_ajax()) { 
                    header('HTTP/1.0 401 Unauthorized');
                    header('Content-Type', 'application/json; charset=utf-8');
                    echo json_encode(array('error_message' => Messages::get('generic.invalid_token')));
                    exit;
                }
                else {
                    $session->flashError('generic.invalid_token');
                    $this->redirect($this->request->referrer());
                }
           }
        }
    }
}
