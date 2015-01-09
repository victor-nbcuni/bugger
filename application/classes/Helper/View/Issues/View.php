<?php defined('SYSPATH') OR die('No direct script access.');

class Helper_View_Issues_View {
   /**
    * Returns a JSON representation of model records.
    *
    * @param   string  $model  Model name
    * @return  JSON string
    */
    public static function getEditableSelectSource($model) {
        $json = array();

        $records = ORM::factory($model)->find_all();

        foreach($records as $record) {
          $json[] = $record->id . ': \'' . $record->name . '\'';
        }

        return '{' . implode(', ', $json) . '}';
    }
}

