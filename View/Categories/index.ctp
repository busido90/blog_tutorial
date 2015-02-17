<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog categories</h1>
<?php
// add category
echo $this->Html->link(
    'Add Categories',
    array('controller' => 'categories', 'action' => 'add')
);
?>

<?php
// echo $this->Form->create('Post', array('action' => 'find'));
// echo $this->Form->input('title');
// echo $this->Form->end('Save Post');
?>

<?php
//findを使う時仕様
// echo $this->Form->create('Category', array(
//     'inputDefaults' => array(
//         'div' => false,
//         'label' => false,
//      'wrapInput' => false,
//     ),
//     'class' => 'well form-inline',
//     'action' => 'find'
// ));
// echo $this->Form->input('title', array(
//         'class' => 'input-small',
//         'placeholder' => '検索タイトル'
// ));
// echo $this->Form->submit('検索', array(
//         'div' => false,
//         'class' => 'btn-success'
//     ));;
// echo $this->Form->end();
?>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit/Delete</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category['Category']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Category']['name'],
array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
        </td>
        <td>
             <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $category['Category']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Category']['id'])); ?>
        </td>
        <td><?php echo $post['Category']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($category); ?>
</table>