<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Project extends Model_Base {
    protected $_table_name = 'projects';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL
    );
}