<?php
if(!isset($_SESSION['user']))
{
    header("Location:index.php?c=users&a=register");
}
?>
<form class="form_register container-fluid" action="<?=base_url?>/chores/save" method="POST">
    <h1>Add a task</h1>
    <label class="label_form" for="title">Title</label>
    <input maxlength="40" autocomplete="off" class="input_register" type="text" name="title" required>

    <label class="label_form" for="content">Content</label>
    <input maxlength="40" autocomplete="off" class="input_register" type="text" name="content" required>

    <input type="submit" class="form_input" value="Add">
</form>