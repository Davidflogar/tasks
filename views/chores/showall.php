<?php
if(isset($_SESSION['user']))
{

}elseif(!isset($_SESSION['user']))
{
    header("Location:index.php?c=users&a=register");
}
?>
<h1>Showing all tasks</h1>
<?php if(isset($_SESSION['save']) && $_SESSION['save']): ?>
    <p><b class="alert good">Task created successfully</b></p>
<?php elseif(isset($_SESSION['save']) && !$_SESSION['save']): ?>
<p class="alert bad"><b>An error has occurred, check that all the data is written correctly and that the number of characters is less than 50<b></p>
<?php endif; ?>
<?php if(isset($_SESSION['alert'])): ?>
    <p class="good"><b><?=$_SESSION['alert']?></b></p>
<?php endif?>
<a class="a_button" href="<?=base_url?>/chores/add">Add a task</a>
<table class="container-fluid">
    <tr>
        <th class="showall_th">Id</th>
        <th class="showall_th">Title</th>
        <th class="showall_th">Content</th>
        <th class="showall_th">Registration Date</th>
    </tr>
    <?php while($c = $showChores->fetch_object()): ?>
        <tr>
            <th class="showall_th"><?php echo $c->id ?></th>
            <th class="showall_th"><?php echo $c->title ?></th>
            <th class="showall_th"><?php echo $c->content ?></th>
            <th class="showall_th"><?php echo $c->date ?></th>
            <th class="showall_th"><a class="edit" href="<?=base_url?>/chores/edit&id=<?=$c->id?>">Editar</a></th>
            <th class="showall_th"><a class="delete" href="<?=base_url?>/chores/delete&id=<?=$c->id?>">Eliminar</a></th>
        </tr>
    <?php
    endwhile; 
    unset($_SESSION['save']);
    unset($_SESSION['alert']);
    ?>
</table>