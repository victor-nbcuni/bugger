<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Auth_User {

    public function action_index()
    {
        // Chart data
        $data = Model_Issue::getStatusBreakdown();

        // Pending chart
        $pending_chart = View::factory('dashboard/_chart_pending')
            ->set('data', json_encode($data));

        // Completion graph
        $completion_chart = View::factory('dashboard/_chart_completion')
            ->set('data', $data)
            ->set('total', ORM::factory('Issue')->count_all());

        // Reported by me chart
        $data = Model_Issue::getStatusBreakdown($this->auth_user->id);
        $reported_by_me_chart = (count($data))
            ? View::factory('dashboard/_chart_reported_by_me')->set('data', json_encode($data))
            : NULL;

        $this->template->content = $view = View::factory('dashboard/index')
            ->set('pending_chart', $pending_chart)
            ->set('completion_chart', $completion_chart)
            ->set('reported_by_me_chart', $reported_by_me_chart);

    }
}

