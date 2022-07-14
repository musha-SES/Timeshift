<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\i18n\FrozenDate;
use Cake\Chronos\Chronos;
use Cake\I18n\Date;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 *
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface ($object = null, array $settings = [])
 */
class MembersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $members = $this->paginate($this->Members);


        $this->set(compact('members'));
        // echo $this->Auth->user('role');
        if($this->Auth->user('role') == 'user'){
            $this->Flash->success(__('不正なURLです'));
            // $this->render('/Members/login');
            $id = $this->Auth->user('id');
            return $this->redirect(['action' => 'users',$id]);
        }

    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => ['Works'],
        ]);

        // $id = $this->Auth->user('id');
        // $work = $this->Works->find()->where(['member_id' => $id])->all();
        // print_r($work);
        $date = Date::now();

        //そのユーザーの最新のレコードのIDと退勤データの有無を取得
        $checkout[] =['','1'];
        $wid[] ='';
        foreach($member->works as $work){
            // echo $work->check_in;
            if($work->created == $date){
            $checkout[0]= $work->check_out;
            $checkin[0]= $work->check_in;
            $wid[0]=$work->id;
        }
        }
        // print_r($wid);
        // print_r($checkout);

        //最新の勤怠データに退勤がある場合
        if($checkout[0] !=''){
            $this->Flash->success(__('出勤していません'));
        }
            // print_r($this->Members->get($id)->id);


        $this->set('member', $member);
        $this->set('wid',$wid[0]);
        if(isset($checkin)){
            $this->set('checkout',$checkout[0]);
        }else{
            $this->set('checkout','1');
        }
    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function users($id = null)
    {
        $date = Date::now();

        try {
            $member = $this->Members->get($id, [
            'contain' => ['Works'],
        ]);
        $checkout[] =['','1'];
        $wid[] ='';
        foreach($member->works as $work){
            // echo $work->check_in;
            if($work->created == $date){
            $checkout[0]= $work->check_out;
            $checkin[0]= $work->check_in;
            $wid[0]=$work->id;
        }
        }

            if($this->Members->get($id)->id !== $this->Auth->user('id') && $this->Auth->user('role') !== 'admin'){
                $this->Flash->success(__('不正なURLです'));
                $id = $this->Auth->user('id');
            return $this->redirect(['action' => 'users',$id]);
        }
            $this->set('member', $member);
            $this->set('wid',$wid[0]);
            if(isset($checkin)){
                $this->set('checkout',$checkout[0]);
            }else{
                $this->set('checkout','1');
            }
        } catch(\Exception $e) {
            // ここに例外が発生した際の処理を書く
            $this->Flash->success(__('不正なURLです'));
            $id = $this->Auth->user('id');
            return $this->redirect(['action' => 'users',$id]);
          }


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->getData());
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $this->set(compact('member'));

        $gender = [1=>'男性', 2=>'女性', 3=>'その他'];

        $this->set('gender', $gender);
    }

    /**
     * Edit method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $member = $this->Members->patchEntity($member, $this->request->getData());
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $this->set(compact('member'));

        $gender = [1=>'男性', 2=>'女性', 3=>'その他'];

        $this->set('gender', $gender);
    }

    /**
     * Delete method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $id = $this->Auth->user('id');

                $this->Auth->setUser($user);

                if ($user["role"] == "user") {
                    return $this->redirect(["action" => "users", $id]);
                } else {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                $this->Flash->error(__('メールアドレスかパスワードが間違っています'));
            }
        }
        $this->set(compact($member));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');


        if (in_array($action, ['index','login','logout','users'])) {

            return true;
        }
        $id = (int)$this->request->getParam('pass.0');
        if(($id == $user['id'])) {
            if (in_array($action,['users'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
}

