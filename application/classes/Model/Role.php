<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Role extends Model_Abstract {
    protected $_table_name = 'roles';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL,
        'description' => NULL
    );
}