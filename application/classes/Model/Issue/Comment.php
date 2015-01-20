<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue_Comment extends Model_Abstract {
    protected $_table_name = 'issue_comments';

    protected $_table_columns = array(
        'id' => NULL,
        'issue_id' => NULL,
        'user_id' => NULL,
        'comment' => NULL,
        'can_edit' => 1,
        'archived' => 0,
        'created_at' => NULL,
        'updated_at' => NULL
    );

    protected $_created_column = array(
        'column' => 'created_at',
        'format' => 'Y-m-d H:i:s'
    );

    protected $_updated_column = array(
        'column' => 'updated_at',
        'format' => 'Y-m-d H:i:s'
    );

    protected $_belongs_to = array(
        'user' => array('model' => 'User', 'foreign_key' => 'user_id'),
        'issue' => array('model' => 'Issue', 'foreign_key' => 'issue_id')
    );

    public function niceDate()
    {
        return date('l d/M/y g:i A', strtotime($this->created_at));
    }

    public static function findByIssueId($issue_id, $offset, $limit)
    {
        return ORM::factory('Issue_Comment')
            ->where('issue_id', '=', $issue_id)
            ->where('archived', '=', 0)
            ->order_by('created_at', 'DESC')
            ->offset($offset) 
            ->limit($limit)
            ->find_all();
    }
}