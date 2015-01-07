<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Abstract_Admin {

    public function action_index()
    {
        $users = ORM::factory('User')->find_all();
        $this->template->content = View::factory('users/index')->set('users', $users);
    }

    public function action_new()
    {
        $user = ORM::factory('User');

        if ($post = $this->request->post()) {
            try {
                if (ORM::factory('User', array('username' => $post['user']['username']))->loaded())
                    throw new Form_Validation_Exception(Messages::get('user.username_taken'));

                if (ORM::factory('User', array('email' => $post['user']['email']))->loaded())
                    throw new Form_Validation_Exception(Messages::get('user.email_taken'));

                $post['user']['name'] = ucwords(strtolower($post['user']['name']));

                if ($user->values($post['user'])->save()) {
                    $user->addRoles($post['roles']);
                }

                $this->session->flashSuccess('generic.create_ok');
                $this->redirect('users');
            }
            catch(Form_Validation_Exception $e) {
                $this->session->flashError($e->getMessage());
                // Repopulate form
                $user->values($post['user']);
            }
        }

        $this->template->content = View::factory('users/form')
            ->set('user', $user);
    }

    public function action_edit()
    {
        $id = $this->request->param('id');
        $user = ORM::factory('User', $id);

        if ( ! $user->loaded()) 
            $this->redirect('users');
        
        if ($post = $this->request->post()) {
            try {
                if (ORM::factory('User')->where('username', '=', $post['user']['username'])->where('id', '<>', $user->id)->find()->loaded())
                    throw new Form_Validation_Exception(Messages::get('user.username_taken'));

                if (ORM::factory('User')->where('email', '=', $post['user']['email'])->where('id', '<>', $user->id)->find()->loaded())
                    throw new Form_Validation_Exception(Messages::get('user.email_taken'));

                $post['user']['name'] = ucwords(strtolower($post['user']['name']));

                if (empty($post['user']['password'])) {
                    // NEVER save blank passwords.
                    unset($post['user']['password']);
                }

                $user->values($post['user'])->save();
                $user->clearRoles();
                $user->addRoles($post['roles']);

                $this->session->flashSuccess('generic.update_ok');
                $this->redirect('users');
            }
            catch(Form_Validation_Exception $e) {
                $this->session->flashError($e->getMessage());
                // Repopulate form
                $user->values($post['user']);
            }
        }

        $this->template->content = View::factory('users/form')
            ->set('user', $user);
    }
}
