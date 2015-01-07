<?php defined('SYSPATH') OR die('No direct script access.');

class Helper_View_Issues_View {
   /**
    * Creates and returns a new model. 
    * Model name must be passed with its' original casing, e.g.
    * 
    *
    * @param   string  $model  Model name
    * @return  json string
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

