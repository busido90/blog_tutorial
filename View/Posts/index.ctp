<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<?php

echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); 

echo "</br>";

echo $this->Html->link(
    'View Categories',
    array('controller' => 'categories', 'action' => 'index')
);

?>



<?php
// echo $this->Form->create('Post', array('action' => 'find'));
// echo $this->Form->input('title');
// echo $this->Form->end('Save Post');
?>

<?php
echo $this->Form->create('Post', array(
    'inputDefaults' => array(
        'div' => false,
        'label' => false,
     'wrapInput' => false,
    ),
    'class' => 'well form-inline',
    'action' => 'find'
));
echo $this->Form->input('title', array(
        'class' => 'input-small',
        'placeholder' => '検索タイトル'
));
echo $this->Form->submit('検索', array(
        'div' => false,
        'class' => 'btn-success'
    ));;
echo $this->Form->end();
?>

<table class="table table-condensed table-bordered">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>編集</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Category']['name']; ?></td>

        <td>
             <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>