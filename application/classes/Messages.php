<?php defined('SYSPATH') OR die('No direct script access.');

class Messages {
    private static $_messages = array(
      'generic.create_ok' => 'Record created successfully.',
      'generic.update_ok' => 'Record updated successfully.',
      'generic.delete_ok' => 'Record deleted successfully.',
      'generic.read_fail' => 'Record not found.',
      'generic.unauthorized' => 'Unauthorized access.',

      'user.email_taken' => 'Sorry, that Email is already registered.',
      'user.username_taken' => 'Sorry, that SSO is already registered.'
    );

    public static function get($key) 
    {
        if (isset(self::$_messages[$key]))
          return self::$_messages[$key];

        return $key;
    }
}