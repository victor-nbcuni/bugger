<?php defined('SYSPATH') or die('No direct script access.');
/**
 * API Controller.
 *
 *  Example CURL request:
 *
 *       $timestamp = time();
 *       $ch = curl_init();
 *       curl_setopt($ch, CURLOPT_URL, 'http://local.bugger.com/api/create_ticket');
 *       curl_setopt($ch, CURLOPT_POST, false);
 *       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 *               'x-api-key: test',
 *               'x-timestamp: ' . $timestamp,
 *               'x-signature: ' . Helper_Api::makeSignature('GET', '/api/create_ticket', 'test', $timestamp)
 *           ));
 *       $content = curl_exec($ch);
 *       curl_close($ch);
 */
class Controller_Api extends Controller {
    const API_KEY = 'test';

    public function action_create_ticket()
    {

    }

    /**
     * Overriden to add security check.
     */
    public function execute()
    {
        // Perform security check
        try {
            Helper_Api::validateRequest($this->request);
        }
        catch(Exception $ex) {
            // Return error message
            $this->response->jsonError($ex->getCode(), $ex->getMessage());
            return $this->response;
        }

        // Execute the "before action" method
        $this->before();

        // Determine the action to use
        $action = 'action_'.$this->request->action();

        // If the action doesn't exist, it's a 404
        if ( ! method_exists($this, $action))
        {
            throw HTTP_Exception::factory(404,
                'The requested URL :uri was not found on this server.',
                array(':uri' => $this->request->uri())
            )->request($this->request);
        }

        // Execute the action itself
        $this->{$action}();

        // Execute the "after action" method
        $this->after();

        // Return the response
        return $this->response;
    }
}

