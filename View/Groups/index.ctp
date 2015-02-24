<h1>Blog users</h1>
<table class="table table-condensed table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($groups as $group): ?>
    <tr>
        <td><?php echo $group['Group']['id']; ?></td>
        <td><?php echo $group['Group']['name']; ?></td>
        <td>
             <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $group['Group']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $group['Group']['id'])); ?>
        </td>
        <td><?php echo $group['Group']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($group); ?>
</table>