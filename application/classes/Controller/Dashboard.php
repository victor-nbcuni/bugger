<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Auth_User {

    public function action_index()
    {
        $this->template->content = $view = View::factory('dashboard/index');
        $view->chart_pending = $this->_pendingChart();
        $view->chart_reported_by_me = $this->auth->logged_in('admin') ? $this->_reportedByMeChart() : $this->_reportedByMeChart();
        $view->stats = $this->_statsChart();
    }

    private function _pendingChart()
    {
        $data = array();

        $statuses = ORM::factory('Issue_Status')
            ->where('id', '<>', Model_Issue_Status::CLOSED)
            ->find_all();

        foreach($statuses as $status) {
            $total = ORM::factory('Issue')
                ->where('status_id', '=', $status->id)
                ->count_all();

            if ($total == 0) 
                continue;
        
            $data[] = array(
                'label' => $status->name,
                'data' => $total,
                'color' => $status->color
            );
        }

        return View::factory('dashboard/_chart_pending')->set('data', json_encode($data));
    }

    private function _reportedByMeChart()
    {
        $data = array();

        foreach(ORM::factory('Issue_Status')->find_all() as $status) {
            $total = ORM::factory('Issue')
                ->where('reporter_user_id', '=', $this->auth_user->id)
                ->where('status_id', '=', $status->id)
                ->count_all();

            if ($total == 0) 
                continue;
        
            $data[] = array(
                'label' => $status->name,
                'data' => $total,
                'color' => $status->color
            );
        }

        return View::factory('dashboard/_chart_reported_by_me')->set('data', json_encode($data));
    }

    private function _statsChart()
    {
        $statuses = ORM::factory('Issue_Status')
            //->where('id', 'NOT IN', array(Model_Issue_Status::OPEN))
            ->find_all();


        foreach($statuses as $status) {
            $status_count = ORM::factory('Issue')
                ->where('status_id', '=', $status->id)
                ->count_all();

            //if ($status_count == 0) 
            //    continue;

            $data[$status->id] = array(
                'label' => $status->name,
                'total' => $status_count,
                'color' => $status->color,
                'id' => $status->id,
                'url' => '/issues#status_id[]=' . $status->id
            );
        }

        // Combine Open & Reopened
        $data[Model_Issue_Status::OPEN]['total'] += $data[Model_Issue_Status::REOPENED]['total'];
        $data[Model_Issue_Status::OPEN]['url'] .= '&status_id[]=' . Model_Issue_Status::REOPENED;
        unset($data[Model_Issue_Status::REOPENED]);

        return View::factory('dashboard/_stats')->set('data', $data);
    }
}

