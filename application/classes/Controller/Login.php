<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Log In and Log Out controller.
 */
class Controller_Login extends Controller {
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
                // Generate a CSRF (Cross-Site-Request-Forgery) token
                $this->session->makeToken();

                // Play theme song "Eye of the Tiger"
                $this->session->set('play_eott', TRUE);

                // Redirect to Dashboard
                return $this->redirect('dashboard');
            }
            else {
                $this->session->flashError('The email or password you entered is incorrect.');
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
