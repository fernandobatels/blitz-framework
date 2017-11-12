<!DOCTYPE html>

<html>
    <head>
           <title>Admin - <?= $this->e($title) ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

<ul>
    <li ><a href="{url}/admin/posts/new">New Post</a></li>
    <li ><a href="{url}/admin/posts">Posts</a></li>
    <li ><a href="{url}/home">Go to home</a></li>
</ul>
         <?= $this->section('content') ?>
    </body>
</html>
