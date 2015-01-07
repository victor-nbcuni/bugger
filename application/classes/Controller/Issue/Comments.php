<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Comments extends Controller_Abstract_Member {
    /**
     * @uses     ajax
     * @return   json/html
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
     * @uses     ajax
     * @return   json/html
     */
    public function action_new()
    { 
        if ($post = $this->request->post()) {
            if ( ! empty($post['issue_id']) && ! empty($post['user_id']) && ! empty($post['comment'])) {
                $comment = ORM::factory('Issue_Comment')
                    ->values($post)
                    ->save();  

                return $this->response->body(View::factory('issue_comments/view')->set('comment', $comment));
            }
        }

        $this->response->badRequest();
    }

    /**
     * @uses     ajax
     * @return   json
     */
    public function action_update_editable_field()
    {
        if ($post = $this->request->post()) {
            $comment = ORM::factory('Issue_Comment', $post['pk']);

            if ( ! $comment->loaded())
                return $this->response->notFound('Invalid comment ID');

            if ($comment->user_id != $this->auth_user->id)
                return $this->response->unauthorized();

            $comment->set($post['name'], $post['value'])->save();
        }
        else {
            $this->response->badRequest();
        }
    }
}