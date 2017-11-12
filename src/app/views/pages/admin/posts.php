<?php 
$this->layout('admin', [
    'title' => 'Posts'
]);

?>

<table>
    <thead>
        <tr>    
            <th>#id</th>
            <th>Title</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($list as $row) {
                echo '<tr>';
                echo "  <td>{$row->id}</td>";
                echo "  <td>{$row->title}</td>";
                echo '</tr>';
            }

        ?>
    </tbody>
</table>
