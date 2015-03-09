<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Search.Prg');
    public $uses = array('Post', 'Category');

    // public function isAuthorized($user) {
    // 登録済ユーザーは投稿できる
    //     if (in_array($this->action, array('index', 'add', 'find', 'view'))) {
    //         return true;
    //     }

    //     // 投稿のオーナーは編集や削除ができる
    //     if (in_array($this->action, array('edit', 'delete'))) {
    //         $postId = (int) $this->request->params['pass'][0];
    //         if ($this->Post->isOwnedBy($postId, $user['id'])) {
    //             return true;
    //         }
    //     }

    //     return parent::isAuthorized($user);
    // }

    public function index() {
        $this->set('posts', $this->Post->find('all',
            array(
                'order' => array('Post.created' => 'DESC')
            )
        ));

        $this->set('user', $this->Auth->user());
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

        $this->set('select', $this->Category->find('list'/*,
            array('fields' => array('id', 'name')
        )*/));

        if ($this->request->is('post')) {
        // $this->Post->create();
        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                // debug($this->request->data);
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