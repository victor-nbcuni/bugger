<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Department extends Model_Abstract {
    const DEV = 1;
     
    protected $_table_name = 'departments';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL,
        'group_email' => NULL
    );
}