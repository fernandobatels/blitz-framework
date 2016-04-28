<?php

/*
 * This file is part of the Blitz package.
 *
 * (c) 2016 Fernando Batels
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
\blitz\vendor\Bootstrap::$settings['app'] = [
    'name' => 'Blitz Framework',
    'author' => 'Fernando Batels <luisfbatels@gmail.com>',
    'url' => 'http://localhost/blitz-framework-3.0'
];


\blitz\vendor\Bootstrap::$settings['pages_groups'] = [
    'index',
        //'blog'
        //'admin'
];
\blitz\vendor\Bootstrap::$settings['db']['host']='localhost';
\blitz\vendor\Bootstrap::$settings['db']['user']='root';
\blitz\vendor\Bootstrap::$settings['db']['pass']='123';
\blitz\vendor\Bootstrap::$settings['db']['name']='testes_blitz';

/**
 * Enable if you use specific lib
 */
//\blitz\vendor\Bootstrap::$settings['vendor_libs'][]= 'bistro';//To Sessions
\blitz\vendor\Bootstrap::$settings['vendor_libs'][] = 'database'; //To Databases
/**
 * Every library needs a infos.php file with your settings
 */
\blitz\vendor\Bootstrap::$settings['app_libs'] = [
        //'api-my-server-folder'
];
/**
 * Every helpers needs a static methods and extends from Helpers class
 */
\blitz\vendor\Bootstrap::$settings['app_helpers'] = [
        //'MyAdmin'
];
