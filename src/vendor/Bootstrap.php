<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 */

namespace blitz\vendor;

/**
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
class Bootstrap {

	/**
	 * Router instance
	 */
    private $router;
    
    /**
     * Default settings
     */
    public static $settings = [
        'use_http_encoding_gzip' => false,
        'use_http_output_minify' => false,
        'root_src' => '',
        'timezone' => 'UTC',
        'locale' => 'pt-br',
        'vendor_src' => '',
        'app_src' => '',
        'storage_src' => '',
        'vendor_libs' => [
            'plates',
            'router',
            'gump'
        ],
        'vendor_helpers' => [
            'Url'
        ],
        'app_libs' => [],
        'app_helpers' => [],
        'app' => [
            'name' => '',
            'author' => '',
            'url' => ''
        ],
        'mime_types_list' => [
            //video
            'video/x-msvideo' => 'avi', 'video/x-flv' => 'flv', 'video/mp4' => 'mp4',
            //audio
            'audio/mpeg' => 'mp3', 'audio/aac' => 'aac', 'audio/wav' => 'wav', 'audio/ogg' => 'oga', 'audio/ogg' => 'ogg',
            //image
            'image/gif' => 'gif', 'image/jpeg' => 'jpeg', 'image/jpeg' => 'jpg', 'image/png' => 'png', 'image/svg+xml' => 'svg',
            //text
            'text/html' => 'html', 'text/css' => 'css', 'text/plain' => 'log', 'text/plain' => 'txt', 'text/xml' => 'xml',
            //applications
            'application/javascript' => 'js', 'application/pdf' => 'pdf', 'application/x-rar-compressed' => 'rar', 'application/x-rar' => 'rar', 'application/x-shellscript' => 'sh', 'application/zip' => 'zip', 'application/json' => 'json'
        ],
        'http_code_list' => [
            //100 - Informational
            100 => 'Continue', 101 => 'Switching Protocols',
            //200 - Successful
            200 => 'OK', 201 => 'Created', 202 => 'Accepted', 203 => 'Non-Authoritative Information', 204 => 'No Content', 205 => 'Reset Content', 206 => 'Partial Content',
            //300 - Redirection
            300 => 'Multiple Choices', 301 => 'Moved Permanently', 302 => 'Found', 303 => 'See Other', 304 => 'Not Modified', 305 => 'Use Proxy', 306 => '(Unused)', 307 => 'Temporary Redirect',
            //400 - Client Error
            400 => 'Bad Request', 401 => 'Unauthorized', 402 => 'Payment Required', 403 => 'Forbidden', 404 => 'Not Found', 405 => 'Method Not Allowed', 406 => 'Not Acceptable', 407 => 'Proxy Authentication Required', 408 => 'Request Timeout', 409 => 'Conflict', 410 => 'Gone', 411 => 'Length Required', 412 => 'Precondition Failed', 413 => 'Request Entity Too Large', 414 => 'Request-URI Too Long', 415 => 'Unsupported Media Type', 716 => 'Requested Range Not Satisfiable', 417 => 'Expectation Failed', 417 => 'Expectation Failed', 422 => 'Unprocessable Entity', 423 => 'Locked', 424 => 'Failed Dependency', 426 => 'Upgrade Required',
            //500 - Server Error
            500 => 'Internal Server Error', 501 => 'Not Implemented', 502 => 'Bad Gateway', 503 => 'Service Unavailable', 504 => 'Gateway Timeout', 505 => 'HTTP Version Not Supported', 506 => 'Variant Also Negotiates', 507 => 'Insufficient Storage', 510 => 'Not Extended'
        ]
    ];
    
    public function start() {
		
        $this->loadConfs();
        $this->loadLibs();
        $this->loadCore();
        $this->runRouter();

    }

    /**
     * Call controller and action. Used by router
     * @param type $name
     * @param type $action
     */
    private function callController($name, $action = null, $dataInput = []) {
        $name = \ucfirst($name);
        $src = self::$settings['app_src'] . '/controllers/' . $name . '.php';
        if (file_exists($src)) {
            require $src;
            if ($action === null) {
                $action = 'index';
            }
            $action = 'action' . ucfirst($action);

            $obj = new \ReflectionClass("blitz\\app\\controllers\\{$name}");
            if ($obj->hasMethod($action) !== true) {
                echo "Sorry, but {$action} method not found in {$name} controller :(";
                exit();
            } else {
                try {
                    $met = $obj->getMethod($action);

                    $met->invoke($obj->newInstance(), $dataInput);
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            }
        } else {
            echo "Sorry, but {$name} controller not found :(";
            exit();
        }
    }

	/**
	 * Call and run router file
	 */
    private function runRouter() {
        $this->router = new \Bramus\Router\Router();

        require self::$settings['app_src'] . '/routs.php';
        $this->router->run();
    }

	/**
	 * Load source core from framework
	 */
    private function loadCore() {
        require Bootstrap::$settings['vendor_src'] . '/core/Helpers.php';
        $this->loadHelpers();
        require Bootstrap::$settings['vendor_src'] . '/core/Model.php';
        require Bootstrap::$settings['vendor_src'] . '/core/ModelDatabase.php';
        require Bootstrap::$settings['vendor_src'] . '/core/Controller.php';
    }
    
	/**
	 * Load core and app helpers
	 */ 
    private function loadHelpers() {
        
        foreach (Bootstrap::$settings['vendor_helpers'] as $helper) {
            $src = Bootstrap::$settings['vendor_src'] . '/core/helpers/' . $helper . '.php';
            $this->loadHelper($src, $helper);
        }
        
        foreach (Bootstrap::$settings['app_helpers'] as $helper) {
            $src = Bootstrap::$settings['app_src'] . '/helpers/' . $helper . '.php';
            $this->loadHelper($src, $helper);
        }

    }

	/**
	 * Load helper file
	 */
    private function loadHelper($src, $helper) {
        
        if (file_exists($src)) {
        
            require $src;
        
        } else {
        
            echo "Sorry, but {$helper} helper not found :(";
        
            exit();
        
        }

    }

	/**
	 * Load file configuration app
	 */
    private function loadConfs() {
        require Bootstrap::$settings['app_src'] . '/confs.php';
    }

    /**
     * Load de libs php into vendor
     * 
     * Every library needs a infos.php file with your settings
     */
    private function loadLibs() {
        foreach (Bootstrap::$settings['vendor_libs'] as $lib) {
            $src = Bootstrap::$settings['vendor_src'] . '/libs/' . $lib;
            $this->loadLib($src, $lib);
        }
        foreach (Bootstrap::$settings['app_libs'] as $lib) {
            $src = Bootstrap::$settings['app_src'] . '/libs/' . $lib;
            $this->loadLib($src, $lib);
        }
    }

	/**
	 * Load file lib infos. This file provide integration with lib 
	*/
    private function loadLib($src, $lib) {
        if (file_exists($src)) {
            $src .= '/infos.php';
            if (file_exists($src)) {
                require $src;
            } else {
                echo "Sorry, but {$lib} library need infos.php file settings";
                exit();
            }
        } else {
            echo "Sorry, but {$lib} library not found :(";
            exit();
        }
    }

}
