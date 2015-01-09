<?php defined('SYSPATH') OR die('No direct script access.');

class Helper_View_Requests_Form {
   /**
    * Returns an array of times for a dropdown field.
    *
    * @return  array
    */
    public static function getTimeSelectOptions() {
        $options = array();
        $options[] = '12:00 AM';

        for($i = 1; $i < 23; $i++) {
            $options[] = ($i < 12) ? $i . ':00 AM' : ($i - 11) . ':00 PM';
        }

        return $options;
    }
}

