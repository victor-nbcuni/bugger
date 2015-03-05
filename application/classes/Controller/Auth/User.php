<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Base user controller.
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

        // Redirect to login page if not logged in
        if ( ! $this->auth->logged_in())
            $this->redirect('login');

        // Turn off auto view rendering on AJAX requests
        if ($this->request->is_ajax()) {
            $this->auto_render = FALSE;
        }

        // Init properties
        $this->session = Session::instance();
        $this->auth_user = $this->auth->get_user();
        $this->log = Log::instance();

        // Set template vars
        $this->template->auth_user = $this->auth_user;
        $this->template->request = $this->request;
        $this->template->auth = $this->auth;
        $this->template->session = $this->session;
    }
}
