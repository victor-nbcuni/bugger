<?php defined('SYSPATH') or die('No direct script access.');

if (Kohana::$environment == Kohana::DEVELOPMENT) {
    // DEV
    return array
    (
        'default' => array
        (
            'type'       => 'PDO',
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
}
else {
    // PRODUCTION
    return array
    (
        'default' => array
        (
            'type'       => 'PDO',
            'connection' => array(
                'dsn'        => 'mysql:host=216.178.106.71;dbname=TLMPTLMDSAS01',
                'username'   => 'teltigrpusr01',
                'password'   => 'tL3P#10&',
                'persistent' => FALSE
            ),
            'table_prefix' => '',
            'charset'      => 'utf8',
            'profiling'    => TRUE
        ),
    );
}
