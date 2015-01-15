<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue_Source_Type extends Model_Abstract {
    const JIRA        = 1;
    const BASECAMP    = 2;
    const LIGHTHOUSE  = 3;

    protected $_table_name = 'issue_source_types';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL
    );
}