<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 */
namespace blitz\vendor\core\helpers;

/**
 * Helper URL default
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class Url extends \blitz\vendor\core\Helpers {

	/**
	 * Build and return url internal link
	 */
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
    
	/**
	 * Return url app
	 */
    public static function urlApp() {
        return \blitz\vendor\Bootstrap::$settings['app']['url'];
    }

}
