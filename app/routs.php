<?php

/*
 * This file is part of the Blitz package.
 *
 * (c) 2016 Fernando Batels
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * 
 * 
 */

/**
 * File to router
 * 
 * 
 * Default router from https://github.com/bramus/router
 */

$this->router->get('/', function (){$this->callController('index');});


