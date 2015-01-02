<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issues extends Controller_Base {

    public function action_index()
    {
        $issues = ORM::factory('Issue')->find_all();
        $this->template->content = View::factory('issues/index')->set('issues', $issues);
    }

    public function action_view()
    {
        $id = $this->request->param('id');
        $issue = ORM::factory('Issue', $id);
        if ( ! $issue->loaded())
            $this->redirect('issues');
        $this->template->content = View::factory('issues/view')->set('issue', $issue);
    }

    public function action_add()
    {
        $issue = ORM::factory('Issue');

        if ($post = $this->request->post()) {
            $post['issue']['status_id'] = 1; // Default to "Open"
            $issue->values($post['issue'])->save();
            $this->redirect('issues');
        }

        $this->template->content = View::factory('issues/form')
            ->set('issue', $issue);
    }

    public function action_edit()
    {
        $id = $this->request->param('id');

        $issue = ORM::factory('Issue', $id);

        if ( ! $issue->loaded()) 
            $this->redirect('issues');
        
        if ($post = $this->request->post()) {
            $issue->values($post['issue'])->save();
            $this->redirect('issues');
        }

        $this->template->content = View::factory('issues/form')
            ->set('issue', $issue);
    }

    /**
     * @ajax
     */
    public function action_update_editable_field()
    {
        $this->auto_render = FALSE;

        if ($post = $this->request->post()) {
            $issue = ORM::factory('Issue', $post['pk']);
            if ( ! $issue->loaded()) {
                return $this->response->body('invalid issue id');
            }

            $issue->set($post['name'], $post['value'])->save();
            return $this->response->body('success');
        }

        $this->response->body('invalid request');
    }
}