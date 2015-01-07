<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Requests extends Controller_Abstract_Member {

    public function action_index()
    {
        $requests = ORM::factory('Issue')
            ->where('type_id', '=', Model_Issue_Type::SUPPORT_REQUEST)
            ->find_all();

        $this->template->content = View::factory('requests/index')
            ->set('requests', $requests);
    }

    public function action_new()
    {
        $record = ORM::factory('Issue');

        if ($post = $this->request->post()) {
            $post['status_id'] = Model_Issue_Status::OPEN;
            $record->values($post)->save();
            $this->session->flashSuccess('generic.create_ok');
            $this->redirect('requests');
        }

        $this->template->content = View::factory('requests/form')
            ->set('request', $record);
    }

    public function action_view()
    {
        $id = $this->request->param('id');
        $record = ORM::factory('Issue', $id);

        if (  ! $record->loaded()) {
            $this->session->flashError('generic.read_fail');
            $this->redirect('requests');
        }

        if ( ! $this->auth->logged_in('admin') && $record->reporter_user_id != $this->auth_user->id) {
            // Restrict access to admins and requester
            $this->session->flashError('generic.unauthorized');
            $this->redirect('requests');
        }

        $this->template->content = View::factory('requests/view')
            ->set('issue', $record);
    }
}