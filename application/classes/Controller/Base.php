<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Base extends Controller_Template {
    public $template = 'layouts/default';
    public $auth;
    public $auth_user;
    public $session;

    public function before()
    {
        parent::before();

        $this->auth = Auth::instance();
        $this->session = Session::instance();

        if ( ! $this->auth->logged_in() && $this->request->baseUri() != 'users/login')
            $this->redirect('users/login');

        $this->auth_user = $this->template->auth_user = $this->auth->get_user();
        $this->template->request = $this->request;
        $this->template->auth = Auth::instance();
        $this->template->session = Session::instance();
    }
}
