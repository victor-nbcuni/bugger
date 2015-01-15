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
        'example_url' => NULL,
        'due_date' => NULL,
        'due_time' => NULL,
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

    protected $_has_many = array(
        'comments' => array('model' => 'Issue_Comment', 'foreign_key' => 'issue_id'),
        'files' => array('model' => 'Issue_File', 'foreign_key' => 'issue_id')
    );

    protected $_belongs_to = array(
        'priority' => array('model' => 'Issue_Priority', 'foreign_key' => 'priority_id'),
        'project' => array('model' => 'Project', 'foreign_key' => 'project_id'),
        'reporter' => array('model' => 'User', 'foreign_key' => 'reporter_user_id'),
        'type' => array('model' => 'Issue_Type', 'foreign_key' => 'type_id'),
        'status' => array('model' => 'Issue_Status', 'foreign_key' => 'status_id'),
        'assigned_department' => array('model' => 'Department', 'foreign_key' => 'assigned_department_id'),
        'source' => array('model' => 'Issue_Source', 'foreign_key' => 'source_id')
    );

    public function getKey() 
    {
        if ($this->type_id == Model_Issue_Type::SUPPORT_REQUEST)
            return 'REQUEST-' . $this->id;
        return strtoupper($this->project->name) . '-' . $this->id;
    }

    /**
     * Returns an array of file paths.
     *
     * @param   bool                Whether or not to return a JSON string
     * @return  array|JSON string
     */
    public function getAttachments($json =  FALSE)
    {
        $arr = array();//glob(Mod::ATTACHMENTS_BASE_UPLOAD_PATH . $this->id . '/*.*');
        foreach($arr as &$filename) {
            $filename = str_replace(DOCROOT, '/', $filename);
        }

        if ($json)
            return json_encode($arr);

        return $arr;
    }

    /**
     * Returns an array of ALL requests or count of NON-CLOSED requests.
     *
     * @param   int  $count Whether or not return a count of requests.
     * @return  int|Model_Issue[]
     */
    public static function findSupportRequests($count = FALSE)
    {
        $auth = Auth::instance();

        $requests = ORM::factory('Issue')
            ->order_by('updated_at', 'DESC')
            ->where('type_id', '=', Model_Issue_Type::SUPPORT_REQUEST);

        if ( ! $auth->logged_in('admin')) {
            // Admins may see ALL requests. Regular users may only see their own requests.
            $requests->where('reporter_user_id', '=', $auth->get_user()->id);
        }

        if ($count) {
            // ONLY count open issues.
            $requests->where('status_id', '<>', Model_Issue_Status::CLOSED);
            return $requests->count_all();
        }
        
        return $requests->find_all();
    }

    /**
     * Returns an array of ALL issues or count of NON-CLOSED issues.
     *
     * @param   int  $count Whether or not return a count of requests.
     * @return  int|Model_Issue[]
     */
    public static function findAllIssues($count = FALSE)
    {
        $requests = ORM::factory('Issue')
            ->order_by('updated_at', 'DESC')
            ->where('type_id', '<>', Model_Issue_Type::SUPPORT_REQUEST);

        if ($count) {
            // ONLY count NON-CLOSED issues.
            $requests->where('status_id', '<>', Model_Issue_Status::CLOSED);
            return $requests->count_all();
        }
        
        return $requests->find_all();
    }

    /**
     * Returns an array or count of NON-CLOSED issues.
     *
     * @param   int  $count Whether or not return a count of issues.
     * @return  int|Model_Issue[]
     */
    public static function findMyOpenIssues($count = FALSE)
    {
        $auth = Auth::instance();
        $auth_user = $auth->get_user();

        $issues = ORM::factory('Issue')
            ->order_by('updated_at', 'DESC')
            ->where('type_id', '<>', Model_Issue_Type::SUPPORT_REQUEST)
            ->where('status_id', '<>', Model_Issue_Status::CLOSED)
            ->where('assigned_department_id', '=', $auth_user->department_id);

        if ($count)
            return $issues->count_all();
        
        return $issues->find_all();
    }

    /**
     * Returns an array of ALL issues or a count of NON-CLOSED issues 
     * that have been reported by the logged in user.
     *
     * @param   int  $count Whether or not return a count of issues.
     * @return  int|Model_Issue[]
     */
    public static function findReportedByMe($count = FALSE)
    {
        $auth = Auth::instance();
        $auth_user = $auth->get_user();

        $issues = ORM::factory('Issue')
            ->order_by('updated_at', 'DESC')
            ->where('type_id', '<>', Model_Issue_Type::SUPPORT_REQUEST)
            ->where('reporter_user_id', '=', $auth_user->id);

        if ($count) {
            // ONLY count open issues.
            $issues->where('status_id', '<>', Model_Issue_Status::CLOSED);
            return $issues->count_all();
        }
        
        return $issues->find_all();
    }
}