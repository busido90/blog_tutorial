<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session', 'Search.Prg');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
        // pr($this->Post->find('all'));

        // いろいろ検証。parseParams()とpassedArgsは両方使える模様。
        // $this->Prg->commonProcess();

        // $paramss = $this->Prg->parsedParams();
        // debug($params);
        // $data = $this->request->data;
        // debug($data);
        // $args = $this->passedArgs;
        // debug($args);   
        // $criteria = $this->Post->parseCriteria($params);
        // debug($criteria);   
        // $find = $this->Post->find('all', array('conditions' => $criteria));
        // debug($find);

    }

    public function find() {
    //詳しくは次のページを見ましょう。http://mawatari.jp/archives/introduction-of-cakedc-search-plugin-for-cakephp
        $this->Prg->commonProcess();

        $params = $this->Prg->parsedParams();
    //     debug($params);
        // パース（構文解析）している。パースとは構文を解析して次に使えるデータとして変換すること。
        $criteria = $this->Post->parseCriteria($params);
    //     debug($criteria)

        $find = $this->Post->find('all', array('conditions' => $criteria));
        
        $this->set('airticles', $find);
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(
                __('The post with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                __('The post with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }

}
?>