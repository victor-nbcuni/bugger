<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Priorities extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/issue_priorities',
        'model' => array(
            'name' => 'Issue_Priority',
            'title' => 'Ticket Priority',
            'title_plural' => 'Ticket Priorities'
        )
    );
}
