<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Abstract_Member {

    public function action_index()
    {
        $this->template->content = $view = View::factory('dashboard/index');
        $view->chart_overview = $this->_chartOverview();
        $view->chart_reported_by_me = $this->auth->logged_in('admin') ? $this->_chartReportedByMe() : $this->_chartReportedByMe();
        $view->stats = $this->_stats();
    }

    private function _chartOverview()
    {
        $data = array();
        $total_issues = ORM::factory('Issue')->count_all();

        foreach(ORM::factory('Issue_Status')->find_all() as $status) {
            $status_total = ORM::factory('Issue')->where('status_id', '=', $status->id)->count_all();

            if ($status_total == 0) 
                continue;

            $percent = ($status_total / $total_issues) * 100;

            $data[] = array(
                'label' => $status->name,
                'data' => $percent,
                'color' => $status->color
            );
        }

        return View::factory('dashboard/_chart_overview')->set('data', json_encode($data));
    }

    private function _chartReportedByMe()
    {
        $data = array();
        $total_issues = ORM::factory('Issue')
            ->where('reporter_user_id', '=', $this->auth_user->id)
            ->count_all();

        foreach(ORM::factory('Issue_Status')->find_all() as $status) {
            $status_total = ORM::factory('Issue')
                ->where('reporter_user_id', '=', $this->auth_user->id)
                ->where('status_id', '=', $status->id)
                ->count_all();

            if ($status_total == 0) 
                continue;

            $percent = ($status_total / $total_issues) * 100;
        
            $data[] = array(
                'label' => $status->name,
                'data' => $percent,
                'color' => $status->color
            );
        }

        return View::factory('dashboard/_chart_reported_by_me')->set('data', json_encode($data));
    }

    private function _stats()
    {
        $statuses = ORM::factory('Issue_Status')
            ->where('id', 'NOT IN', array(Model_Issue_Status::REOPENED, Model_Issue_Status::CLOSED))
            ->find_all();

        foreach($statuses as $status) {
            $status_total = ORM::factory('Issue')
                ->where('status_id', '=', $status->id)
                ->count_all();

            $data[] = array(
                'label' => $status->name,
                'total' => $status_total,
                'color' => $status->color,
                'id' => $status->id
            );
        }

        return View::factory('dashboard/_stats')->set('data', $data);
    }
}

