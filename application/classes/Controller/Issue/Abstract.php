<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Issue_Abstract extends Controller_Base {

    protected $_config = array(
        'base_url' => '',
        'model' => array(
            'name'          => '', 
            'title'         => '', 
            'title_plural'  => ''
        )
    );

    public function action_index()
    {
        $rows = ORM::factory($this->_config['model']['name'])->find_all();
        $this->template->content = View::factory('issue_abstract/index')
            ->set('rows', $rows)
            ->set('config', $this->_config);
    }

    public function action_add()
    {
        $model = ORM::factory($this->_config['model']['name']);

        if ($post = $this->request->post()) {
            $model->values($post)->save();
            $this->redirect($this->_config['base_url']);
        }

        $this->template->content = View::factory('issue_abstract/form')
            ->set('model', $model)
            ->set('config', $this->_config);
    }

    public function action_edit()
    {
        $id = $this->request->param('id');

        $model = ORM::factory($this->_config['model']['name'], $id);

        if ( ! $model->loaded()) 
            $this->redirect($this->_config['base_url']);
        
        if ($post = $this->request->post()) {
            $model->values($post)->save();
            $this->redirect($this->_config['base_url']);
        }

        $this->template->content = View::factory('issue_abstract/form')
            ->set('model', $model)
            ->set('config', $this->_config);
    }

    public function action_delete()
    {
        $id = $this->request->param('id');

        $model = ORM::factory($this->_config['model']['title'], $id);

        if ($model->loaded()) {
            $model->delete();
        }

        $this->redirect($this->_config['base_url']);
    }
}