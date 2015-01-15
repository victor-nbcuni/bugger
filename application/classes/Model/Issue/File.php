<?php defined('SYSPATH') OR die('No direct script access.');

class Model_Issue_File extends Model_Abstract {
    const BASE_UPLOAD_PATH = UPLOAD_PATH . 'attachments/issues/';
    const MAX_UPLOAD_FILESIZE = 16000000; // Bytes (4 MB)

    protected $_table_name = 'issue_files';

    protected $_table_columns = array(
        'id' => NULL,
        'filename' => NULL,
        'issue_id' => NULL,
        'user_id' => NULL,
        'created_at' => NULL
    );

    protected $_created_column = array(
        'column' => 'created_at',
        'format' => 'Y-m-d H:i:s'
    );

    public function url()
    {
        return str_replace(DOCROOT, '/', self::BASE_UPLOAD_PATH) . $this->issue_id . '/' . $this->filename;
    }

    public function path()
    {
        return self::BASE_UPLOAD_PATH . $this->issue_id . '/' . $this->filename;
    }

    /**
     * Moves an uploaded file to the right directory and saves it to database.
     *
     * @param   array      $file         The uploaded file data
     * @param   int        $issue_id     The issue id the file belongs to
     * @param   int        $user_id      The uploader user id
     * @throws  Exception
     */
    public static function processUploadedFile($file, $issue_id, $user_id)
    {
        $dest_base_path = self::BASE_UPLOAD_PATH . $issue_id . '/';
        $dest_path = $dest_base_path . $file['name'];

        // Create dir if doesn't exist
        if ( ! file_exists($dest_base_path))
            mkdir($dest_base_path, 0777);

        // Save file
        //if (file_exists($dest_path))
        //    unlink($dest_path);

        move_uploaded_file($file['tmp_name'], $dest_path);

        // Add file to database
        $record = ORM::factory('Issue_File')
            ->where('issue_id', '=', $issue_id)
            ->where('filename', '=', $file['name'])
            ->find();

        if ( ! $record->loaded()) {
            $record->values(array(
                    'issue_id' => $issue_id,
                    'filename' => $file['name'],
                    'user_id' => $user_id
                ))->save();
        }
        else {
            $record->values(array(
                    'user_id' => $user_id,
                    'created_at' => date('Y-m-d H:i:s')
                ))->save();
        }

    }

    /**
     * Moves a group of uploaded temp files to the right directory and saves them to database.
     *
     * @param   string      $temp_dir     The name of the temp dir of the uploaded file
     * @param   int         $issue_id     The issue id the files belong to
     * @param   int         $user_id      The uploader user id
     * @throws  Exception
     */
    public static function processUploadedTempFiles($temp_dir, $issue_id, $user_id)
    {
        $temp_path = UPLOAD_TMP_PATH . $temp_dir;

        if ( ! file_exists($temp_path))
            return;

        // Move temp files
        rename($temp_path, self::BASE_UPLOAD_PATH . $issue_id);

        // Save files to database
        $files = glob(self::BASE_UPLOAD_PATH . $issue_id . '/*');

        foreach($files as $path) {
            ORM::factory('Issue_File')
            ->values(array(
                'issue_id' => $issue_id,
                'user_id' => $user_id,
                'filename' => basename($path)
            ))
            ->save();
        }
    }

    /**
     * Removes file from database and filesystem.
     *
     * @param   int         $file_id
     * @throws  Exception
     */
    public static function removeFile($file_id)
    {
        $file = ORM::factory('Issue_File', $file_id);

        if ($file->loaded()) {
            $path = $file->path();

            if (file_exists($path))
                unlink($path);

            $file->delete();
        }
    }  
}