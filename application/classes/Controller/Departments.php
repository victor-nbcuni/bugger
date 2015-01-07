<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Departments extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/departments',
        'model' => array(
            'name' => 'Department', 
            'title' => 'Department', 
            'title_plural' => 'Departments'
        )
    );
}