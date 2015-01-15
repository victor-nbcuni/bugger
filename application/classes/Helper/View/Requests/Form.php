<?php defined('SYSPATH') OR die('No direct script access.');

class Helper_View_Requests_Form {
   /**
    * Returns an array of times for a drop down field.
    *
    * @return  array
    */
    public static function getTimeSelectOptions() {
        $options = array();

        // AM
        $options[] = '12:00 AM';
        for($i = 1; $i <= 11; $i++) {
            $options[] = $i . ':00 AM';
        }

        // PM
        $options[] = '12:00 PM';
        for($i = 1; $i <= 11; $i++) {
            $options[] = $i . ':00 PM';
        }

        return $options;
    }
}

