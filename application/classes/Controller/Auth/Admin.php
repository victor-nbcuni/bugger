<?php defined('SYSPATH') or die('No direct script access.');
/**
* Base admin controller. Restricts access to administrator pages.
*/
abstract class Controller_Auth_Admin extends Controller_Auth_User {

    public function before()
    {
        parent::before();

        // Redirect to dashboard if not admin user
        if ( ! $this->auth->logged_in('admin') && ! in_array($this->request->action(), array('profile', 'change_password'))) {
            $this->session->flashError('Unauthorized access');
            $this->redirect('dashboard');
        }
    }
}
