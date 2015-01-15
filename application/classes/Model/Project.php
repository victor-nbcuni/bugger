<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Project extends Model_Abstract {
    protected $_table_name = 'projects';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL,
        'created_at' => NULL
    );

    protected $_created_column = array(
        'column' => 'created_at',
        'format' => 'Y-m-d H:i:s'
    );
}