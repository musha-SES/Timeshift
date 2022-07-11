<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 *
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
            'contain' => ['Working'],
        ]);

        $this->set('member', $member);
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
        $member = $this->Members->get($id, [
            'contain' => ['Working'],
        ]);

        $this->set('member', $member);
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
        //$member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            //$member = $this->Members->patchEntity($member, $this->request->data);
            $user = $this->Auth->identify();
            if ($user) {
                // $this->Auth->setUser($user);
                $id = $this->Auth->user('id');
            
                $this->Auth->setUser($user);
                // var_dump($user["role"]);
                // exit();
                if ($user["role"] == "user") {
                    return $this->redirect(["action" => "users", $id]);
                } else {
                    return $this->redirect($this->Auth->redirectUrl());
                }

            } else {
                $this->Flash->error('メールアドレスかパスワードが間違っています');
            }
        }
        //$this->set(compact($member));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        if (in_array($action, ['login','add','logout'])) {
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

