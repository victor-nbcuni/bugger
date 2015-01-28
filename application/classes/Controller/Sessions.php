<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sessions extends Controller {
    public $template = NULL;
    public $auth = NULL;
    public $session = NULL;

    public function before()
    {
        parent::before();
        $this->auth = Auth::instance();
        $this->session = Session::instance();
    }

    public function action_login() 
    {
        if ($this->request->method() == Request::POST)  {
            if ($this->auth->login($this->request->post('username'), $this->request->post('password'))) {
                // Generate a CSRF token
                $this->session->makeToken();
                // Redirect to Dashboard
                $this->session->set('play_eott', TRUE);
                return $this->redirect('dashboard');
            }
            else {
                $this->session->flashError('Sorry, unrecognized username or password.');
            }
        }
        $this->response->body(View::factory('layouts/login'));
    }

    public function action_logout() 
    {
        $this->auth->logout();
        $this->redirect('login');
    }
}