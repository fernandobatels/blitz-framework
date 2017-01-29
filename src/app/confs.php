<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

\blitz\vendor\Bootstrap::$settings['app'] = [
    'name' => 'Blitz Framework',
    'author' => 'Fernando Batels',
    'author_email' => 'luisfbatels@gmail.com',
    'url' => 'http://localhost/blitz-framework-3.0'
];


\blitz\vendor\Bootstrap::$settings['use_http_encoding_gzip'] = true;
\blitz\vendor\Bootstrap::$settings['use_http_output_minify'] = true;
\blitz\vendor\Bootstrap::$settings['groups_views'] = [
    'index',
        //'blog'
        //'admin'
];
\blitz\vendor\Bootstrap::$settings['db']['host'] = 'localhost';
\blitz\vendor\Bootstrap::$settings['db']['user'] = 'root';
\blitz\vendor\Bootstrap::$settings['db']['pass'] = '123';
\blitz\vendor\Bootstrap::$settings['db']['name'] = 'testes_blitz';
\blitz\vendor\Bootstrap::$settings['db']['driver'] = 'mysql';
\blitz\vendor\Bootstrap::$settings['db']['charset'] = 'utf8';

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


setlocale(LC_MONETARY,"pt_BR");
//~ ini_set("display_errors", "1");
error_reporting(E_ALL);
//~ error_reporting(0);

