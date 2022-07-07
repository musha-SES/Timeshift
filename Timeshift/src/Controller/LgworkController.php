<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lgwork Controller
 *
 * @property \App\Model\Table\LgworkTable $Lgwork
 *
 * @method \App\Model\Entity\Lgwork[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LgworkController extends AppController
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
        $lgwork = $this->paginate($this->Lgwork);

        $this->set(compact('lgwork'));
    }

    /**
     * View method
     *
     * @param string|null $id Lgwork id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lgwork = $this->Lgwork->get($id, [
            'contain' => ['Members'],
        ]);

        $this->set('lgwork', $lgwork);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lgwork = $this->Lgwork->newEntity();
        if ($this->request->is('post')) {
            $lgwork = $this->Lgwork->patchEntity($lgwork, $this->request->getData());
            if ($this->Lgwork->save($lgwork)) {
                $this->Flash->success(__('The lgwork has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lgwork could not be saved. Please, try again.'));
        }
        $members = $this->Lgwork->Members->find('list', ['limit' => 200]);
        $this->set(compact('lgwork', 'members'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lgwork id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lgwork = $this->Lgwork->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lgwork = $this->Lgwork->patchEntity($lgwork, $this->request->getData());
            if ($this->Lgwork->save($lgwork)) {
                $this->Flash->success(__('The lgwork has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lgwork could not be saved. Please, try again.'));
        }
        $members = $this->Lgwork->Members->find('list', ['limit' => 200]);
        $this->set(compact('lgwork', 'members'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lgwork id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lgwork = $this->Lgwork->get($id);
        if ($this->Lgwork->delete($lgwork)) {
            $this->Flash->success(__('The lgwork has been deleted.'));
        } else {
            $this->Flash->error(__('The lgwork could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
