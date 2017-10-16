<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 * 
 * File to router
 * 
 * Default router from https://github.com/bramus/router
 */

$this->router->get('/', function (){$this->callController('index');});


