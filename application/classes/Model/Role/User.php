<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Role_User extends Model_Abstract {
    protected $_table_name = 'roles_users';

    protected $_table_columns = array(
        'user_id' => NULL,
        'role_id' => NULL
    );
}