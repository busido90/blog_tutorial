<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
));
?>
<fieldset>
	<legend>Post add</legend>
<?php
echo $this->Form->input('title', array(
	'label' => 'Title',
	'placeholder' => 'タイトルを入力してください',
));

// debug($select);

echo $this->Form->input( 'category_id', array( 
    'type' => 'select', 
    'options' => $select));
echo $this->Form->input('body', array(
	'label' => 'Title',
	'placeholder' => 'タイトルを入力してください',
	'rows' => '3'
));
echo $this->Form->submit('Submit', array(
	'div' => 'form-group',
	'class' => 'btn btn-default'
));
?>
</fieldset>

<?php echo $this->Form->end(); ?>