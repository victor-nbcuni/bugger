<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projects extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/projects',
        'model' => array(
            'name'          => 'Project', 
            'title'         => 'Project', 
            'title_plural'  => 'Projects'
        )
    );
}