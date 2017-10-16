<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 */

require './vendor/Bootstrap.php';

blitz\vendor\Bootstrap::$settings['root_src'] = (__DIR__);
blitz\vendor\Bootstrap::$settings['vendor_src'] = (__DIR__).'/vendor';
blitz\vendor\Bootstrap::$settings['app_src'] = (__DIR__).'/app';
blitz\vendor\Bootstrap::$settings['storage_src'] = (__DIR__).'/app/storage';
(new blitz\vendor\Bootstrap())->start();
