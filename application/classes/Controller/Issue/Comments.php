<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Comments extends Controller_Auth_User {
    /**
     * @uses     ajax
     * @return   json / html
     */
    public function action_index()
    {
        $limit      = (int) Arr::get($_GET, 'limit', 5);
        $offset     = (int) Arr::get($_GET, 'offset', 0);
        $issue_id   = (int) Arr::get($_GET, 'issue_id', 0);

        $comments = Model_Issue_Comment::findByIssueId($issue_id, $offset, $limit);

        $view = View::factory('issue_comments/ajax')
            ->set('auth_user', $this->auth_user)
            ->set('comments', $comments);

        $this->response->body($view);
    }

    /**
     * @uses     ajax
     * @return   json / html
     */
    public function action_create()
    { 
        if ($post = $this->request->post()) {
            if ( ! empty($post['issue_id']) && ! empty($post['user_id']) && ! empty($post['comment'])) {
                $comment = ORM::factory('Issue_Comment')
                    ->set('can_edit', 1)
                    ->values($post)
                    ->save(); 

                $comment->issue->set('updated_at', date('Y-m-d H:i:s'))->save();

                $view = View::factory('issue_comments/view')
                    ->set('auth_user', $this->auth_user)
                    ->set('comment', $comment);

                return $this->response->body($view);
            }
        }

        $this->response->badRequest();
    }

    /**
     * @uses     ajax
     * @return   json
     */
    public function action_update()
    {
        if ($post = $this->request->post()) {
            $id = $this->request->param('id');

           if ( ! is_numeric($id))
                return $this->response->badRequest('Missing comment ID');

            $comment = ORM::factory('Issue_Comment', $id);

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