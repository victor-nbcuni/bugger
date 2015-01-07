<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Request_Statuses extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/request_statuses',
        'model' => array(
            'name' => 'Request_Status', 
            'title' => 'Request Status', 
            'title_plural' => 'Request Statuses'
        )
    );
}