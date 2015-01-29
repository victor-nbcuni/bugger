<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Global Exception Handler.
 */
class Kohana_Exception extends Kohana_Kohana_Exception {
 
    public static function response(Exception $e)
    {
      if (Kohana::$environment > Kohana::PRODUCTION) {
        // Turn on errors on DEV
        //return parent::response($e);
      }

      $response = Response::factory()
        ->body('<h1>Oops! Something went wrong.</h1><h3>' . $e->getMessage() . '</h3>');

      Log::instance()->add(Log::ERROR, $e->getMessage());

      return $response;
    }    
}