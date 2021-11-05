<h1>Edit task</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Content</th>
    </tr>
    <?php while($results = $result->fetch_object()):?>
        <form action="<?=base_url?>/chores/editsave&id=<?=$results->id?>" method="POST">
            <tr>
                <th><input name="title" type="text" value="<?=$results->title?>"></th>
                <th><input name="content" type="text" value="<?=$results->content?>"></th>
                <th><input type="submit" value="Edit"></th>
            </tr>
        </form>
    <?php endwhile; ?>
</table>