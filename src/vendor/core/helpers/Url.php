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
namespace blitz\vendor\core\helpers;

/**
 * Helper URL default
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class Url extends \blitz\vendor\core\Helpers {

    public static function to($to = 'home', $params = []) {
        
        $r = self::urlApp() . '/' . $to;
        
        $isFirst = true;
        
        foreach ($params as $key => $val) {
            if ($isFirst) {
				$isFirst = false;
				$r .= "?{$key}={$val}";
			} else {
				$r .= "&{$key}={$val}";
			}
            
        }
        
        return $r;
    
    }

    /**
     * Converter marks in url
     * @param type $content
     * @return type
     */
    public static function converterUrl($content) {
    
        $content = self::auxConverter(self::urlApp(), $content, [ '{url}', '{app}', '{home}', '{link}']);
    
        $content = self::auxConverter(self::urlApp() . '/app/views/assets', $content, '{assets}');
    
        return $content;
    
    }

    private static function auxConverter($to, $content, $from = array()) {
        return str_replace($from, $to, $content);
    }

    public static function urlApp() {
        return \blitz\vendor\Bootstrap::$settings['app']['url'];
    }

}
