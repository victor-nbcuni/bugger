<?php defined('SYSPATH') OR die('No direct script access.');

class Model_ApiUser extends Model_Abstract {
    protected $_table_name = 'api_users';

    protected $_table_columns = array(
        'id' => NULL,
        'api_key' => NULL,
        'is_active' => NULL
    );

    public static function validateKey($api_key)
    {
        return ORM::factory('ApiUser')
            ->where('api_key', '=', $api_key)
            ->where('is_active', '=', 1)
            ->find()
            ->loaded();
    }
}