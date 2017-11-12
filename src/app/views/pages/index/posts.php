<?php $this->layout('default') ?>

<h1>Posts</h1>
<?php
    foreach ($list as $row) {
        echo "<a href='{url}/post/{$row->id}'>{$row->title}</a><br/>";
    }

?>

