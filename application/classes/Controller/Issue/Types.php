<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Issue_Types extends Controller_Issue_Abstract {

    protected $_config = array(
        'base_url' => '/issue_types',
        'model' => array(
            'name' => 'Issue_Type', 
            'title' => 'Ticket Type', 
            'title_plural' => 'Ticket Types'
        )
    );

    public function action_index()
    {
        $records = ORM::factory($this->_config['model']['name'])->find_all();
        $this->template->content = View::factory('issue_abstract/index')
            ->set('records', $records)
            ->set('config', $this->_config);
    }
}