<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Session extends Kohana_Session {
    public static $flash_styles = array(
        'warning' => array(
            'theme' => 'warning',
            'icon'  => 'fa-exclamation-circle'
        ),
        'success' => array(
            'theme' => 'success',
            'icon'  => 'fa-check-circle'
        ),
        'error' => array(
            'theme' => 'danger',
            'icon'  => 'fa-times-circle'
        ),
        'notice' => array(
            'theme' => 'info',
            'icon'  => 'fa-info-circle'
        )
    );

    public function flashError($message)
    {
        $this->set('flash_message', array('type' => 'error', 'message' => Messages::get($message)));
    } 

    public function flashSuccess($message)
    {
        $this->set('flash_message', array('type' => 'success', 'message' => Messages::get($message)));
    } 

    public function flashWarning($message)
    {
        $this->set('flash_message', array('type' => 'warning', 'message' => Messages::get($message)));
    } 

    public function flashNotice($message)
    {
        $this->set('flash_message', array('type' => 'info', 'message' => Messages::get($message)));
    }
   
    public function getFlash()
    {
        return $this->get_once('flash_message', NULL);
    }

    public function getFlashHtml()
    {
        $flash = $this->get_once('flash_message', NULL);

        if ( ! $flash) 
            return NULL;

        $style = isset(Session::$flash_styles[$flash['type']]) ? Session::$flash_styles[$flash['type']] : Session::$flash_styles['info'];

        return View::factory('shared/flash_message')
            ->set('style', $style)
            ->set('message', $flash['message'])
            ->render();
    }
}