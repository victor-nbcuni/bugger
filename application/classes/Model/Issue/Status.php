<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue_Status extends Model_Abstract {
    const OPEN              = 1;
    const IN_PROGRESS       = 2;
    const RESOLVED          = 3;
    const CLOSED            = 4;
    const ON_HOLD           = 5;
    const READY_FOR_TESTING = 6;
    const REOPENED          = 7;

    protected $_table_name = 'issue_statuses';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL
    );
}