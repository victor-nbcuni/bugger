<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Auth_User {

    public function action_index()
    {
        $chart_data = Model_Issue::getStatusBreakdown();

        // Pending chart
        $pending_chart = View::factory('dashboard/_chart_pending')
            ->set('chart_data', json_encode($chart_data));

        // Completion graph
        $completion_chart = View::factory('dashboard/_chart_completion')
            ->set('chart_data', $chart_data)
            ->set('total_issues', ORM::factory('Issue')->count_all());

        // Reported by me chart
        $reported_by_me_chart = View::factory('dashboard/_chart_reported_by_me')
            ->set('chart_data', json_encode(Model_Issue::getStatusBreakdown($this->auth_user->id)) );

        $this->template->content = $view = View::factory('dashboard/index')
            ->set('pending_chart', $pending_chart)
            ->set('completion_chart', $completion_chart)
            ->set('reported_by_me_chart', $reported_by_me_chart);

    }
}

