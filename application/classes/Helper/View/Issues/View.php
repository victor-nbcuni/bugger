<?php defined('SYSPATH') OR die('No direct script access.');

class Helper_View_Issues_View {
    public static function getEditableSelectSource($model_name) {
        $json = array();

        $rows = ORM::factory($model_name)->find_all();
        foreach($rows as $row) {
          $json[] = $row->id . ': \'' . $row->name . '\'';
        }

        return '{' . implode(', ', $json) . '}';
    }
}

