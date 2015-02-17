<?php
class DiariesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index() {
    	$data = $this->Diary->find('all', array('conditions' => array('id' => 1)));

    	$this->set('data', $data);
	}
}
?>