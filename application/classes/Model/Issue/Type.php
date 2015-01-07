<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue_Type extends Model_Abstract {
    const BUG               = 1;
    const IMPROVEMENT       = 2;
    const NEW_FEATURE       = 3;
    const TASK              = 4;
    const SUPPORT_REQUEST   = 5;

    protected $_table_name = 'issue_types';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL
    );

    public function find_all($all = FALSE)
    {
      if ( ! $all) {
        $this->where('id', '<>', self::SUPPORT_REQUEST);
      }
      return parent::find_all();
    }
}