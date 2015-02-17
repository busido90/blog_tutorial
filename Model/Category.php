<?php
class Category extends AppModel {

//behaviorの設定
	// public $actsAs = array(
	//         'Search.Searchable'
	//     );

//findで使う検索方法ん指定
    // public $filterArgs = array(
    //     'title' => array(
    //         'type' => 'like'
    //     ),
    // );

//save()の時のvalidation
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>