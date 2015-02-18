<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('BoostCake', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
));

<fieldset>
	<legend>Legend</legend>

echo $this->Form->input('text', array(
	'label' => 'Title',
	'placeholder' => 'タイトルを入力してください',
));

// debug($select);

echo $this->Form->input( 'category', array( 
    'type' => 'select', 
    'options' => $select));
echo $this->Form->input('text', array(
	'label' => 'Title',
	'placeholder' => 'タイトルを入力してください',
	'rows' => '3'
));
echo $this->Form->submit('Submit', array(
	'div' => 'form-group',
	'class' => 'btn btn-default'
));
</fieldset>


<?php echo $this->Form->end(); ?>

?>