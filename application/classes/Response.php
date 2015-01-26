<?php defined('SYSPATH') OR die('No direct script access.');

class Response extends Kohana_Response {
    /**
     * Sets the body of the response to a JSON string.
     *
     * @param array   $body       The body of the response
     */
    public function json(array $body = array()) 
    {
        $this->headers('Content-Type', 'application/json; charset=utf-8');
        $this->body(json_encode($body));
    }

    /**
     * Sets the body of the response to a JSON string.
     *
     * @param int     $status     An HTTP status code
     * @param mixed   $body       The body of the response
     */
    public function jsonError($status, $body)
    {
        $this->status($status);

        if (is_string($body)) {
            $body = array('error_message' => $body);
        }

        $this->json($body);
    }

    public function serverError($error_message = 'Server error') 
    {
        $this->jsonError(500, $error_message);
    }

    public function badRequest($error_message = 'Invalid request') 
    {
        $this->jsonError(400, $error_message);
    }

    public function unauthorized($error_message = 'Unauthorized access') 
    {
        $this->jsonError(401, $error_message);
    }

    public function notFound($error_message = 'Not found') 
    {
        $this->jsonError(404, $error_message);
    }
}