<table class="container-fluid">
    <tr>
        <th class="showall_th">Id</th>
        <th class="showall_th">Title</th>
        <th class="showall_th">Content</th>
        <th class="showall_th">Registration date</th>
    </tr>
    <?php while($resultados = $resultado->fetch_object()): ?>
        <tr>
            <th class="showall_th"><?=$resultados->id?></th>
            <th class="showall_th"><?=$resultados->title?></th>
            <th class="showall_th"><?=$resultados->content?></th>
            <th class="showall_th"><?=$resultados->date?></th>
            <th class="showall_th"><a class="edit" href="<?=base_url?>/chores/edit&id=<?=$resultados->id?>">Editar</a></th>
            <th class="showall_th"><a class="delete" href="<?=base_url?>/chores/delete&id=<?=$resultados->id?>">Eliminar</a></th>
        </tr>
    <?php endwhile; ?>
</table>