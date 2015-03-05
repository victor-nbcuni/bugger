<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Session extends Kohana_Session {
    private $_flash_styles = array(
        'warning' => array(
            'theme' => 'warning',
            'icon'  => 'fa-exclamation-circle'
        ),
        'info' => array(
            'theme' => 'success',
            'icon'  => 'fa-check-circle'
        ),
        'error' => array(
            'theme' => 'danger',
            'icon'  => 'fa-times-circle'
        ),
    );

    /**
     * Sets a flash message.
     *
     * @param string $message   A flash message
     */
    public function flashError($message)
    {
        $this->set('flash_message', array('type' => 'error', 'message' => Messages::get($message)));
    }

    public function flashSuccess($message)
    {
        $this->set('flash_message', array('type' => 'info', 'message' => Messages::get($message)));
    }

    public function flashWarning($message)
    {
        $this->set('flash_message', array('type' => 'warning', 'message' => Messages::get($message)));
    }

    /**
     * Gets the flash message as a plain string.
     *
     * @return string
     */
    public function getFlash()
    {
        return $this->get_once('flash_message', NULL);
    }

    /**
     * Gets the flash message as an HTML formatted string.
     *
     * @return string
     */
    public function getFlashHtml()
    {
        $flash = $this->getFlash();

        if ( ! $flash)
            return NULL;

        $style = array_key_exists($flash['type'], $this->_flash_styles)
            ? $this->_flash_styles[$flash['type']]
            : $this->_flash_styles['info']; // Default to info

        return View::factory('shared/flash_message')
            ->set('style', $style)
            ->set('message', $flash['message'])
            ->render();
    }

    /**
     * Generates a CSRF token for the session. Called from Controller_Login::action_login()
     *  upon successful authentication.
     */
    public function makeToken()
    {
        $auth = Auth::instance();
        $this->set('crsf_token', $auth->hash(md5(uniqid(rand(), true))));
    }

    public function getToken()
    {
        return $this->get('crsf_token');
    }
}
