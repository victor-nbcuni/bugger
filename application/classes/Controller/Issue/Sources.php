<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Sources extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/issue_sources',
        'model' => array(
            'name' => 'Issue_Source', 
            'title' => 'Issue Source', 
            'title_plural' => 'Issue Sources'
        )
    );
}