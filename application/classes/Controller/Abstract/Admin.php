<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Abstract_Admin extends Controller_Abstract_Member {

    public function before()
    {
        parent::before();

        if ( ! $this->auth->logged_in('admin')) {
          $this->session->flashError('Unauthorized access');
          $this->redirect('dashboard');
        }
    }
}
