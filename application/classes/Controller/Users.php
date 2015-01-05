<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Base {

    public function action_login() 
    {
        if ($this->request->method() == Request::POST)  {
            if ($this->auth->login($this->request->post('username'), $this->request->post('password'))) {
                return $this->redirect('issues');
            }
            else {
                $this->session->flashError('Sorry, unrecognized username or password.');
            }
        }

        $this->template = View::factory('users/login');
    }

    public function action_logout() 
    {
        $this->auth->logout();
        $this->redirect('users/login');
    }

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
                if (ORM::factory('User', array('username' => $post['user']['username']))->loaded())
                    throw new Form_Validation_Exception('Sorry, that SSO is already being used.');

                if (ORM::factory('User', array('email' => $post['user']['email']))->loaded())
                    throw new Form_Validation_Exception('Sorry, that Email is already being used.');

                $post['user']['name'] = ucwords(strtolower($post['user']['name']));

                if ($user->values($post['user'])->save()) {
                    $user->addRoles($post['roles']);
                }

                $this->redirect('users');
            }
            catch(Form_Validation_Exception $e) {
                $this->session->flashError($e->getMessage());
                // Set values to repopulate form
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
                    throw new Form_Validation_Exception('Sorry, that SSO is already being used.');

                if (ORM::factory('User')->where('email', '=', $post['user']['email'])->where('id', '<>', $user->id)->find()->loaded())
                    throw new Form_Validation_Exception('Sorry, that Email is already being used.');

                $post['user']['name'] = ucwords(strtolower($post['user']['name']));

                // Never save blank password
                if (empty($post['user']['password'])) {
                    unset($post['user']['password']);
                }

                if ($user->values($post['user'])->save()) {
                    $user->clearRoles();
                    $user->addRoles($post['roles']);
                }

                $this->redirect('users');
            }
            catch(Form_Validation_Exception $e) {
                $this->session->flashError($e->getMessage());
                // Set values to repopulate form
                $user->values($post['user']);
            }
        }

        $this->template->content = View::factory('users/form')
            ->set('user', $user);
    }
}
