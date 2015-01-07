<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Roles extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/roles',
        'model' => array(
            'name' => 'Role', 
            'title' => 'Role', 
            'title_plural' => 'Roles'
        )
    );
}