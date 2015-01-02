<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Session extends Kohana_Session {

    public function flashError($message)
    {
        $this->set('flash_message', array('type' => 'error', 'message' => $message));
    } 

    public function flashSuccess($message)
    {
        $this->set('flash_message', array('type' => 'success', 'message' => $message));
    } 

    public function flashWarning($message)
    {
        $this->set('flash_message', array('type' => 'warning', 'message' => $message));
    } 
   
    public function getFlash()
    {
        return $this->get_once('flash_message', NULL);
    }
}