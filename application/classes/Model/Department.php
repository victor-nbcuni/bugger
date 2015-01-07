<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Department extends Model_Abstract {
    protected $_table_name = 'departments';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL
    );
}