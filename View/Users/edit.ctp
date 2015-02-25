<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php

debug($this->request->data);

echo $this->Form->create('User');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>