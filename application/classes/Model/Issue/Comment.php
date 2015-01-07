<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue_Comment extends Model_Abstract {
    protected $_table_name = 'issue_comments';

    protected $_table_columns = array(
        'id' => NULL,
        'issue_id' => NULL,
        'user_id' => NULL,
        'comment' => NULL,
        'created_at' => NULL
    );

    protected $_created_column = array(
        'column' => 'created_at',
        'format' => 'Y-m-d H:i:s'
    );

    protected $_belongs_to = array(
        'user' => array('model' => 'User', 'foreign_key' => 'user_id')
    );

    public function niceDate()
    {
        return date('l d/M/y g:i A', strtotime($this->created_at));
    }
}