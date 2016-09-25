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

require './vendor/Bootstrap.php';

blitz\vendor\Bootstrap::$settings['root_src'] = (__DIR__);
blitz\vendor\Bootstrap::$settings['vendor_src'] = (__DIR__).'/vendor';
blitz\vendor\Bootstrap::$settings['app_src'] = (__DIR__).'/app';
blitz\vendor\Bootstrap::$settings['storage_src'] = (__DIR__).'/app/storage';
(new blitz\vendor\Bootstrap())->start();
