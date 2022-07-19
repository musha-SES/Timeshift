<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\TableRegistry;
/**
 * Works Controller
 *
 * @property \App\Model\Table\WorksTable $Works
 *
 * @method \App\Model\Entity\Works[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Members'],
        ];
        $works = $this->paginate($this->Works);

        $this->set(compact('works'));
    }

    /**
     * View method
     *
     * @param string|null $id Works id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $works = $this->Works->get($id, [
            'contain' => ['Members'],
        ]);

        $this->set('works', $works);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $id = $this->Auth->user('id');
        // echo $id;
        $date = Date::now();
        $time = time::now();

        // echo $date. '<br>';


        $work = $this->Works->find()->where(['member_id' => $id])->all();
        // print_r($work);

        $create[] ='a';
        foreach($work as $work){
            // echo $work->check_in;
            if($work->created == $date){
            $create[0]= $work->check_out;
        }
        }
        // echo $create[0];
        // print_r($this->request->getData());
        $works = $this->Works->newEntity();
        // echo $create[0];
        if($create[0] ==''){
            $this->Flash->success(__('退勤していません'));
            return $this->redirect( ['controller' => 'Members', 'action' => 'index']);

        }else{

            // if ($this->request->is('post')) {
                // print_r($works, $this->request->getData());
                $works = $this->Works->newEntity();
                $works->check_in= $time;
                $works->member_id=$id;
                if ($this->Works->save($works)) {
                    $this->Flash->success(__('出勤しました'));

                    if($this->Auth->user('role') == 'user'){
                        return $this->redirect(['controller' => 'Members', 'action' => 'users', $id]);
                    }if($this->Auth->user('role') == 'admin'){
                        return $this->redirect(['controller' => 'Members', 'action' => 'index']);
                    }
                // }
        // }
            $this->Flash->error(__('The works could not be saved. Please, try again.'));
        }
        $members = $this->Works->Members->find('list', ['limit' => 200]);
        $this->set(compact('work','works', 'members','date','time'));
    }
    }

    //     $works = $this->Works->newEntity();
    //     if ($this->request->is('post')) {
    //         $works = $this->Works->patchEntity($works, $this->request->getData());
    //         if ($this->Works->save($works)) {
    //             $this->Flash->success(__('The works has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The works could not be saved. Please, try again.'));
    //     }
    //     $members = $this->Works->Members->find('list', ['limit' => 200]);
    //     $this->set(compact('works', 'members'));
    // }


    /**
     * Edit method
     *
     * @param string|null $id Works id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $works = $this->Works->get($id, [
            'contain' => [],
        ]);

        $time = time::now();
        $aid = $this->Auth->user('id');
        $date = Date::now();
        $work = $this->Works->find()->where(['id'=>$id])->all();
        $m_id=$works->member_id ;
        $this->loadModel('Members');
        $users = $this->Members->find()->where(['id'=>$m_id])->all();
        // print_r($users);
        foreach($users as $users){
            $name= $users->name;
        }
        // print_r($work);
        $mem_id[] ='';
        foreach($work as $work){
            //echo $work->check_in;
            if($work->member_id == $aid){
            $mem_id[0]= $work->created;
        }
        }

        $works = $this->Works->get($id, [
            'contain' => [],
        ]);

        if($mem_id[0] !=''){

        if ($this->request->is(['patch', 'post', 'put'])) {

            $works = $this->Works->patchEntity($works, $this->request->getData());
            if ($this->Works->save($works)) {
                $this->Flash->success(__('The works has been saved.'));
                if($this->Auth->user('role') == 'user'){
                    return $this->redirect(['controller' => 'Members', 'action' => 'users', $aid]);
                }else{
                    return $this->redirect(['controller' => 'Members', 'action' => 'index']);
                }
            }
            $this->Flash->error(__('The works could not be saved. Please, try again.'));
        }
    }
        $members = $this->Works->Members->find('list', ['limit' => 200]);

        $this->set(compact( 'members','works','aid','name','time'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Works id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $works = $this->Works->get($id);
        if ($this->Works->delete($works)) {
            $this->Flash->success(__('The works has been deleted.'));
        } else {
            $this->Flash->error(__('The works could not be deleted. Please, try again.'));
        }
        $id = $this->Auth->user('id');
        return $this->redirect(['controller' => 'Members', 'action' => 'users', $id]);
    }





    public function taikin($id = null)
    {
        $works = $this->Works->get($id, [
            'contain' => [],
        ]);

        $time = time::now();
        $aid = $this->Auth->user('id');
        $date = Date::now();
        $work = $this->Works->find()->where(['id'=>$id])->all();
        $m_id=$works->member_id ;
        $this->loadModel('Members');
        $users = $this->Members->find()->where(['id'=>$m_id])->all();
        // print_r($users);
        foreach($users as $users){
            $name= $users->name;
        }
        // print_r($work);
        $mem_id[] ='';
        foreach($work as $work){
            // echo $work->check_in;
            if($work->member_id == $aid){
            $mem_id[0]= $work->created;
        }
        }

        $works = $this->Works->get($id, [
            'contain' => [],
        ]);

        if($mem_id[0] !=''){

        // if ($this->request->is(['patch', 'post', 'put'])) {

            $works = $this->Works->patchEntity($works, ['id'=>$id,'check_out'=>$time,]);
            if ($this->Works->save($works)) {
                $this->Flash->success(__('退勤しました'));
                if($this->Auth->user('role') == 'user'){
                    return $this->redirect(['controller' => 'Members', 'action' => 'users', $aid]);
                }else{
                    return $this->redirect(['controller' => 'Members', 'action' => 'index']);
                }
            // }
            $this->Flash->error(__('The works could not be saved. Please, try again.'));
        }
    }
        $members = $this->Works->Members->find('list', ['limit' => 200]);
        $this->set(compact( 'members','works','aid','name','time'));

    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        if (in_array($action, ['login','add','logout','taikin'])) {
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
