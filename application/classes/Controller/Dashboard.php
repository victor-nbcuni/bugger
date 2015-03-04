<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Auth_User {

    public function action_index()
    {
        // Chart data
        $data = Model_Issue::getStatusBreakdown();

        // Pending chart
        $pending_chart = View::factory('dashboard/_pie_chart')
            ->set('data', json_encode($data))
            ->set('title', 'Pending Tickets')
            ->set('container_id', 'pendingChart');

        // Completion graph
        $completion_chart = View::factory('dashboard/_completion_chart')
            ->set('data', $data)
            ->set('total', ORM::factory('Issue')->count_all());

        // Reported by me chart
        if (count($data = Model_Issue::getStatusBreakdown($this->auth_user->id))) {
            $reported_by_me_chart = View::factory('dashboard/_pie_chart')
                ->set('data', json_encode($data))
                ->set('title', 'Reported By Me')
                ->set('container_id', 'reportedByMeChart');
        }
        else {
            $reported_by_me_chart = NULL;
        }

        $this->template->content = $view = View::factory('dashboard/index')
            ->set('pending_chart', $pending_chart)
            ->set('completion_chart', $completion_chart)
            ->set('reported_by_me_chart', $reported_by_me_chart);
    }
}

