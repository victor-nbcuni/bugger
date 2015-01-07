<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Abstract_Member {

    public function action_index()
    {
        $this->template->content = View::factory('dashboard/index');
    }
}