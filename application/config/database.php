<?php defined('SYSPATH') or die('No direct script access.');

return array
(
    'default' => array
    (
        'type'       => 'pdo',
        'connection' => array(
            'dsn'        => 'mysql:host=localhost;dbname=bugger',
            'username'   => 'root',
            'password'   => 'root',
            'persistent' => FALSE
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'profiling'    => TRUE
    ),
);