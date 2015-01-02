<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Comments extends Controller {
    /**
    * @ajax
    */
    public function action_index()
    {
        $limit      = (int) Arr::get($_GET, 'limit', 5);
        $offset     = (int) Arr::get($_GET, 'offset', 0);
        $issue_id   = (int) Arr::get($_GET, 'issue_id', 0);

        $comments = ORM::factory('Issue_Comment')
            ->where('issue_id', '=', $issue_id)
            ->order_by('created_at', 'DESC')
            ->offset($offset) 
            ->limit($limit)
            ->find_all();
            
        $this->response->body(View::factory('issue_comments/index')->set('comments', $comments));
    }

    /**
    * @ajax
    */
    public function action_create()
    {
        $post = $this->request->post();
        if ($post && isset($post['issue_id'], $post['user_id'], $post['comment'])) {
            $comment = ORM::factory('Issue_Comment')
                ->values($post)
                ->save();  
            $this->response->body(View::factory('issue_comments/view')->set('comment', $comment));
        }
    }

    /**
     * @ajax
     */
    public function action_update_editable_field()
    {
        $this->auto_render = FALSE;

        if ($post = $this->request->post()) {
            $issue = ORM::factory('Issue_Comment', $post['pk']);
            if ( ! $issue->loaded()) {
                return $this->response->body('invalid issue id');
            }

            $issue->set($post['name'], $post['value'])->save();
            return $this->response->body('success');
        }

        $this->response->body('invalid request');
    }
}