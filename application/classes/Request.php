<?php defined('SYSPATH') OR die('No direct script access.');

class Request extends Kohana_Request {

    public function currentPage() 
    {
        return strtolower($this->controller() . '/' . $this->action());
    }
}