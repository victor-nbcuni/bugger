<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Company extends Model_Abstract {
    protected $_table_name = 'companies';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL
    );
}