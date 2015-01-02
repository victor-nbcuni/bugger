<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Types extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/issue_types',
        'model' => array(
            'name'          => 'Issue_Type', 
            'title'         => 'Issue Type', 
            'title_plural'  => 'Issue Types'
        )
    );
}