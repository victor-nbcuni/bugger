<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Model_Abstract extends ORM {

    public function __get($column)
    {
        $value = $this->get($column);

        switch($column) {
            case 'created_at':
                return date('d/M/y g:i A', strtotime($value));
            case 'updated_at':
                return (strpos($value, '0000-00-00') === FALSE ? date('d/M/y g:i A', strtotime($value)) : '');
        }

        return $value;
    }

    /**
     * Overridden to fill the updated column (Lines 52-59)
     * @param  Validation $validation Validation object
     * @throws Kohana_Exception
     * @return ORM
     */
    public function create(Validation $validation = NULL)
    {
        if ($this->_loaded)
            throw new Kohana_Exception('Cannot create :model model because it is already loaded.', array(':model' => $this->_object_name));

        // Require model validation before saving
        if ( ! $this->_valid OR $validation)
        {
            $this->check($validation);
        }

        $data = array();
        foreach ($this->_changed as $column)
        {
            // Generate list of column => values
            $data[$column] = $this->_object[$column];
        }

        if (is_array($this->_created_column))
        {
            // Fill the created column
            $column = $this->_created_column['column'];
            $format = $this->_created_column['format'];

            $data[$column] = $this->_object[$column] = ($format === TRUE) ? time() : date($format);
        }

        if (is_array($this->_updated_column))
        {
            // Fill the updated column
            $column = $this->_updated_column['column'];
            $format = $this->_updated_column['format'];

            $data[$column] = $this->_object[$column] = ($format === TRUE) ? time() : date($format);
        }

        $result = DB::insert($this->_table_name)
            ->columns(array_keys($data))
            ->values(array_values($data))
            ->execute($this->_db);

        if ( ! array_key_exists($this->_primary_key, $data))
        {
            // Load the insert id as the primary key if it was left out
            $this->_object[$this->_primary_key] = $this->_primary_key_value = $result[0];
        }
        else
        {
            $this->_primary_key_value = $this->_object[$this->_primary_key];
        }

        // Object is now loaded and saved
        $this->_loaded = $this->_saved = TRUE;

        // All changes have been saved
        $this->_changed = array();
        $this->_original_values = $this->_object;

        return $this;
    }
}