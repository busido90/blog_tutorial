<?php
class Post extends AppModel {

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }

	public $actsAs = array(
	        'Search.Searchable'
	    ); 

    public $filterArgs = array(
        'title' => array(
            'type' => 'like'
        ),
    );

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array('Category', 'User');
}
?>