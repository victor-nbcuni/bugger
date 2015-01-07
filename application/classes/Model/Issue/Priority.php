<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue_Priority extends Model_Abstract {
    protected $_table_name = 'issue_priorities';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL
    );
}