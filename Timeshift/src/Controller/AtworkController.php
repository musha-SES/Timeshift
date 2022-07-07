<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AtWork Controller
 *
 * @property \App\Model\Table\AtWorkTable $AtWork
 *
 * @method \App\Model\Entity\AtWork[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtWorkController extends AppController
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
        $atWork = $this->paginate($this->AtWork);

        $this->set(compact('atWork'));
    }

    /**
     * View method
     *
     * @param string|null $id At Work id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atWork = $this->AtWork->get($id, [
            'contain' => ['Members'],
        ]);

        $this->set('atWork', $atWork);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atWork = $this->AtWork->newEntity();
        if ($this->request->is('post')) {
            $atWork = $this->AtWork->patchEntity($atWork, $this->request->getData());
            if ($this->AtWork->save($atWork)) {
                $this->Flash->success(__('The at work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The at work could not be saved. Please, try again.'));
        }
        $members = $this->AtWork->Members->find('list', ['limit' => 200]);
        $this->set(compact('atWork', 'members'));
    }

    /**
     * Edit method
     *
     * @param string|null $id At Work id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atWork = $this->AtWork->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atWork = $this->AtWork->patchEntity($atWork, $this->request->getData());
            if ($this->AtWork->save($atWork)) {
                $this->Flash->success(__('The at work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The at work could not be saved. Please, try again.'));
        }
        $members = $this->AtWork->Members->find('list', ['limit' => 200]);
        $this->set(compact('atWork', 'members'));
    }

    /**
     * Delete method
     *
     * @param string|null $id At Work id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atWork = $this->AtWork->get($id);
        if ($this->AtWork->delete($atWork)) {
            $this->Flash->success(__('The at work has been deleted.'));
        } else {
            $this->Flash->error(__('The at work could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
