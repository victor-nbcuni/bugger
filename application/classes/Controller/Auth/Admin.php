<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Base admin controller.
 */
abstract class Controller_Auth_Admin extends Controller_Auth_User {

    public function before()
    {
        parent::before();

        if ( ! $this->auth->logged_in('admin') && ! in_array($this->request->action(), array('profile', 'change_password'))) {
          $this->session->flashError('Unauthorized access');
          $this->redirect('dashboard');
        }
    }
}
