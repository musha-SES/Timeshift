<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Working Controller
 *
 * @property \App\Model\Table\WorkingTable $Working
 *
 * @method \App\Model\Entity\Working[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkingController extends AppController
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
        $working = $this->paginate($this->Working);

        $this->set(compact('working'));
    }

    /**
     * View method
     *
     * @param string|null $id Working id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $working = $this->Working->get($id, [
            'contain' => ['Members'],
        ]);

        $this->set('working', $working);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $working = $this->Working->newEntity();
        if ($this->request->is('post')) {
            $working = $this->Working->patchEntity($working, $this->request->getData());
            if ($this->Working->save($working)) {
                $this->Flash->success(__('The working has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The working could not be saved. Please, try again.'));
        }
        $members = $this->Working->Members->find('list', ['limit' => 200]);
        $this->set(compact('working', 'members'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Working id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $working = $this->Working->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $working = $this->Working->patchEntity($working, $this->request->getData());
            if ($this->Working->save($working)) {
                $this->Flash->success(__('The working has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The working could not be saved. Please, try again.'));
        }
        $members = $this->Working->Members->find('list', ['limit' => 200]);
        $this->set(compact('working', 'members'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Working id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $working = $this->Working->get($id);
        if ($this->Working->delete($working)) {
            $this->Flash->success(__('The working has been deleted.'));
        } else {
            $this->Flash->error(__('The working could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
