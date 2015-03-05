<?php defined('SYSPATH') OR die('No direct script access.');

class Request extends Kohana_Request {
    /**
     * Gets the current URI.
     *
     * @return string
     */
    public function page()
    {
        return strtolower($this->controller() . '/' . $this->action());
    }
}
