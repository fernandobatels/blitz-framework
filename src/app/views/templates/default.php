<!DOCTYPE html>

<html>
    <head>
           <title><?= $this->e($title) ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="{url}/app/views/assets/style.css"/>
    </head>
    <body>

<ul>
    <li ><a href="{url}/home">Home</a></li>
    <li ><a href="{url}/posts">Posts</a></li>
    <li ><a href="{url}/admin/posts">Go to admin</a></li>
</ul>
         <?= $this->section('content') ?>
    </body>
</html>
