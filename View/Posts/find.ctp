<h1>Serch result</h1>

<?php
echo $this->Html->link(
    'Return index',
    array('controller' => 'posts', 'action' => 'index')
);
 ?>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$airticles配列をループして、投稿記事の情報を表示 -->
<!-- 	<?php debug($airticles); ?>    -->
    <?php foreach ($airticles as $airticle): ?>
    <tr>
        <td><?php echo $airticle['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($airticle['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $airticle['Post']['id'])); ?>
        </td>
        <td><?php echo $airticle['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>