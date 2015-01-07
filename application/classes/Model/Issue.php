<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue extends Model_Abstract {
    protected $_table_name = 'issues';

    protected $_table_columns = array(
        'id' => NULL,
        'status_id' => NULL,
        'type_id' => NULL,
        'project_id' => NULL,
        'priority_id' => NULL,
        'reporter_user_id' => NULL,
        'assigned_department_id' => NULL,
        'summary' => NULL,
        'description' => NULL,
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

    protected $_has_many = array('comments' => array('model' => 'Issue_Comment', 'foreign_key' => 'issue_id'));

    protected $_belongs_to = array(
        'priority' => array('model' => 'Issue_Priority', 'foreign_key' => 'priority_id'),
        'project' => array('model' => 'Project', 'foreign_key' => 'project_id'),
        'reporter' => array('model' => 'User', 'foreign_key' => 'reporter_user_id'),
        'type' => array('model' => 'Issue_Type', 'foreign_key' => 'type_id'),
        'status' => array('model' => 'Issue_Status', 'foreign_key' => 'status_id'),
        'assigned_department' => array('model' => 'Department', 'foreign_key' => 'assigned_department_id')
    );

    public function getKey() 
    {
        if ($this->type_id == Model_Issue_Type::SUPPORT_REQUEST)
            return 'REQUEST - ' . $this->id;
        return strtoupper($this->project->name) . '-' . $this->id;
    }
}