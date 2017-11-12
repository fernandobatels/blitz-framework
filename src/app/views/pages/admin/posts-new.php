<?php 
$this->layout('admin', [
    'title' => 'Posts'
]) 
?>

<form method="post">

<label>Title *</label><br/>
<input required name="title"/>
<br/>
<br/>


<label>Content *</label><br/>
<textarea required name="content" rows="10" cols="100"></textarea>
<br/>
<br/>

<input type="submit" value="Send">
</form>
