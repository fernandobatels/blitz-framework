<?php
/*
 * Blitz Framework - Small Framework to PHP
 * Copyright (C) 2016 Fernando Batels <luisfbatels@gmail.com>
 * 
 * File to router
 * 
 * Default router from https://github.com/bramus/router
 */

$this->router->get('/', function () {
    $this->callController('index');
});

$this->router->get('/home', function () {
    $this->callcontroller('index');
});

$this->router->get('/posts', function () {
    $this->callcontroller('index', 'posts');
});

$this->router->get('/post/(\d+)', function ($id) {
    $this->callcontroller('index', 'post', $id);
});



$this->router->match('POST|GET','/admin/posts', function () {
    $this->callcontroller('AdminPosts');
});

$this->router->get('/admin/posts/new', function () {
    $this->callcontroller('AdminPosts', 'new');
});

$this->router->post('/admin/posts/new', function () {
    $this->callcontroller('AdminPosts', 'newSubmit');
});


