<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 */
namespace blitz\vendor\core;

/**
 * Base Controller
 *
 * @author Fernando Batels <luisfbatels@gmail.com>
 */
abstract class Controller {

    private $inputObj;
    private $inputType;
    private $session;

    /**
     * Start process to safe input data
     * 
     * @param type $type
     */
    protected function inputStart($type) {
        $this->inputObj = new \GUMP();
        $this->inputType = $this->inputObj->sanitize($type);
    }

    /**
     * Get data from request
     */
    protected function getInputData() {
        $data = $this->inputObj->run(\GUMP::xss_clean($this->inputType));
        if ($data === false){
			return null;
		}
		return $data;
    }
    
    /**
     * Get human readable error text in an array 
     */
    protected function getReadableErrorsInput() {
        return $this->inputObj->get_readable_errors(false);
    }
    
    /**
     * Fetch an array of validation errors indexed by the field names
     */
    protected function getErrorsInput() {
        return $this->inputObj->get_errors_array();
    }
    
    /**
     * Check if input seted content
     * @return boolean
     */
    protected function inputIsSet() {
        if (isset($this->inputType)) {
            return is_array($this->inputType);
        }
        return false;
    }

    /**
     * Add filter in data from request
     */
    protected function inputAddFilter($rules = []) {
        $this->inputObj->filter_rules($rules);
    }

    /**
     * Add validation
     */
    protected function inputAddValidation($rules = []) {
        $this->inputObj->validation_rules($rules);
    }

    /**
     * Check if exists name session.
     * 
     * This method is public to use in router file
     * 
     * @param type $name
     * @return type
     */
    public function sessionHas($name) {
        $this->auxSession();
        return $this->sessionGet($name) !== null;
    }

    /**
     * Get data from session
     * @param type $name
     * @return type
     */
    protected function sessionGet($name) {
        $this->auxSession();
        return $this->session->get($name);
    }

    /**
     * Set data in session
     * @param type $name
     * @param type $val
     */
    protected function sessionSet($name, $val) {
        $this->auxSession();
        $this->session->set($name, $val);
    }

    /**
     * Destroy session
     */
    protected function sessionDestroy() {
        $this->auxSession();
        $this->session->destroy();
    }

    private function auxSession() {
        if ($this->session === null) {
            $this->session = new \Bistro\Session\Native;
        }
    }

    /**
     * Check if request input is ajax
     * @return boolean
     */
    public static function inputIsAjax() {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Response request
     */
    public static function output($content, $type = 'text/html', $codeHttp = 200, $allowMinify = true) {
		
        if ( \blitz\vendor\Bootstrap::$settings['use_http_encoding_gzip'] && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
            ob_start("ob_gzhandler");
        } else {
            ob_start();
        }
        
        header('X-Powered-By: Blitz Framework ' . \blitz\vendor\Bootstrap::$settings['app']['author']);
        header('Expires: max-age=0');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Content-Language: ' . \blitz\vendor\Bootstrap::$settings['locale']);
        header('Server: Blitz Framework');
        
        if ($type !== null) {
            header("Content-type: {$type}; charset=UTF-8");
        }
        
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $codeHttp . ' ' . \blitz\vendor\Bootstrap::$settings['http_code_list'][$codeHttp] . ' - Blitz Framework', true, $codeHttp);
        
        if ($content !== null) {
            
            if ( \blitz\vendor\Bootstrap::$settings['use_http_output_minify'] && $allowMinify) {
				$content = trim(str_replace(array("\r\n", "\r", "\n", "\t", "  "), '', $content));
			}
			
            echo $content;
            
            
        }
        
        ob_end_flush();
    }

    /**
     * Force download
     * @param type $showName
     * @param type $src
     * @param type $length
     * @param type $extension
     * @param type $contentDispositon
     */
    protected function outputDownload($showName, $src, $length, $extension = 'rar', $contentDispositon = 'attachment') {
        $mt = null;
        foreach (\blitz\vendor\Bootstrap::$settings['mime_types_list'] as $key => $value) {
            if ($value === $extension) {
                $mt = $key;
                break;
            }
        }
        self::output(null, $mt,200,false);
        header("Content-Disposition: {$contentDispositon};{$showName}={$src}");
        header("Content-Length: {$length}");
    }

    /**
     * Redirect internal app link
     * @param type $to
     * @param type $params
     */
    protected function redirectInternal($to = 'home', $params = []) {
        self::outputRedirect($to, $params, true);
    }

    /**
     * Redirect alias method
     * @param type $to
     * @param type $params
     */
    protected function redirect($to = 'home', $params = []) {
        $this->redirectInternal($to, $params);
    }

    /**
     * Redirect to external site link
     * @param type $to
     * @param type $params
     */
    protected function redirectExternal($to, $params = []) {
        self::outputRedirect($to, $params, false);
    }

    /**
     * This method is public to use in router file
     * 
     * @param type $to
     * @param type $params
     * @param type $internal
     * @param type $code
     */
    public static function outputRedirect($to = 'home', $params = [], $internal = false, $code = 307) {
        self::output(null, null, $code,false);
        if ($internal) {
            $to = \blitz\vendor\core\helpers\Url::to($to, $params);
        }
        header("Location: {$to}");
        exit(0);
    }

    /**
     * Write data output in json format
     * @param array $data
     */
    protected function outputJson($data = []) {
        self::output($this->applyToUrl(json_encode($data)), 'application/json', 200, false);
    }

    /**
     * Write data output in text format
     * @param string $data
     */
    protected function outputTxt($data = '') {
        self::output($this->applyToUrl($data), 'text/plain', 200, false);
    }

    /**
     * Replace all ocurrences from specific tags in text
     * @param string $content
     * @return string
     */
    protected function applyToUrl($content) {
        return \blitz\vendor\core\helpers\Url::converterUrl($content);
    }

    /**
     * Write data output in html format with a engine template
     * 
     * @param string $page
     * @param array $data
     * @param int $codeHttp
     * @param boolean $allowMinify
     */
    protected function outputPage($page = 'home', $data = [], $codeHttp = 200, $allowMinify = true) {
        $templates = new \League\Plates\Engine(\blitz\vendor\Bootstrap::$settings['app_src'] . '/views/templates');

        $templates->loadExtension(new \League\Plates\Extension\Asset(\blitz\vendor\Bootstrap::$settings['app_src'] . '/views/assets', true));
        
        foreach (glob(\blitz\vendor\Bootstrap::$settings['app_src'] . '/views/pages/*' , GLOB_ONLYDIR) as $key) {
            $templates->addFolder(basename($key), $key);
        }

        self::output($this->applyToUrl($templates->render($page, $data)),'text/html', $codeHttp, $allowMinify);
    }

    public function actionIndex() {
        self::output('Hello word :)');
    }

}
