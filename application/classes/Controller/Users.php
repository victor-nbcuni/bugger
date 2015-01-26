<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Auth_Admin {

    public function action_index()
    {
        $users = ORM::factory('User')->find_all();
        $this->template->content = View::factory('users/index')->set('users', $users);
    }

    public function action_add()
    {
        $user = ORM::factory('User');

        if ($post = $this->request->post()) {
            try {
                if (Model_User::exists('username', $post['user']['username']))
                    throw new Form_Validation_Exception(Messages::get('user.username_taken'));

                if (Model_User::exists('email', $post['user']['email']))
                    throw new Form_Validation_Exception(Messages::get('user.email_taken'));

                $post['user']['name'] = ucwords(strtolower($post['user']['name']));

                // Create user
                $user->values($post['user'])->save();

                // Assign roles
                $user->addRoles($post['roles']);

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
                if ($user->username != $post['user']['username'] && Model_User::exists('username', $post['user']['username']))
                    throw new Form_Validation_Exception(Messages::get('user.username_taken'));

                if ($user->email != $post['user']['email'] && Model_User::exists('email', $post['user']['email']))
                    throw new Form_Validation_Exception(Messages::get('user.email_taken'));

                // Capitalize name
                $post['user']['name'] = ucwords(strtolower($post['user']['name']));

                // NEVER save blank passwords
                if (empty($post['user']['password'])) {
                    unset($post['user']['password']);
                }

                // Save user
                $user->values($post['user'])->save();

                // Assign roles
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
