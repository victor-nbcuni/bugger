<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Statuses extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/issue_statuses',
        'model' => array(
            'name' => 'Issue_Status', 
            'title' => 'Issue Status', 
            'title_plural' => 'Issue Statuses'
        )
    );
}