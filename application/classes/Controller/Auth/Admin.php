<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Abstract class used as the parent of all admin restricted areas.
 */
abstract class Controller_Auth_Admin extends Controller_Auth_User {

    public function before()
    {
        parent::before();

        if ( ! $this->auth->logged_in('admin')) {
          $this->session->flashError('Unauthorized access');
          $this->redirect('dashboard');
        }
    }
}
