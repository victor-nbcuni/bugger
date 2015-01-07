<?php defined('SYSPATH') OR die('No direct script access.');

class Model_User extends Model_Auth_User {
    protected $_table_name = 'users';

    protected $_table_columns = array(
        'id' => NULL,
        'department_id' => NULL,
        'email' => NULL,
        'username' => NULL,
        'password' => NULL,
        'name' => NULL,
        'logins' => NULL,
        'last_login' => NULL
    );

    protected $_belongs_to = array(
        'department' => array('model' => 'Department', 'foreign_key' => 'department_id')
    );

    /**
     * Rules for the user model. Because the password is _always_ a hash
     * when it's set,you need to run an additional not_empty rule in your controller
     * to make sure you didn't hash an empty string. The password rules
     * should be enforced outside the model or with a model helper method.
     *
     * @return array Rules
     */
    public function rules()
    {
        return array();
        return array(
            'username' => array(
                array('not_empty'),
                array('max_length', array(':value', 32)),
                array(array($this, 'unique'), array('username', ':value')),
            ),
            'password' => array(
                array('not_empty'),
            ),
            'email' => array(
                array('not_empty'),
                array('email'),
                array(array($this, 'unique'), array('email', ':value')),
            ),
        );
    }

    public function addRoles($role_ids = array())
    {
        foreach($role_ids as $role_id) {
            ORM::factory('Role_User')->values(array('user_id' => $this->id, 'role_id' => $role_id))->save();
        }
    }

    public function clearRoles()
    {
        return DB::query(Database::DELETE, 'DELETE FROM roles_users WHERE user_id = ' . $this->id)->execute();
    }
}