<?php defined('SYSPATH') OR die('No direct access allowed.');

Route::set('login', 'login')
    ->defaults(array(
        'controller' => 'Login',
        'action'     => 'login',
    ));

Route::set('logout', 'logout')
    ->defaults(array(
        'controller' => 'Login',
        'action'     => 'logout',
    ));

Route::set('default', '(<controller>(/<action>(/<id>)))')
    ->defaults(array(
        'controller' => 'Dashboard',
        'action'     => 'index',
    ));
