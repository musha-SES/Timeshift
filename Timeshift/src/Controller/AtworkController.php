<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Atwork Controller
 *
 * @property \App\Model\Table\AtworkTable $Atwork
 *
 * @method \App\Model\Entity\Atwork[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtworkController extends AppController
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
        $atwork = $this->paginate($this->Atwork);

        $this->set(compact('atwork'));
    }

    /**
     * View method
     *
     * @param string|null $id Atwork id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atwork = $this->Atwork->get($id, [
            'contain' => ['Members'],
        ]);

        $this->set('atwork', $atwork);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atwork = $this->Atwork->newEntity();
        if ($this->request->is('post')) {
            $atwork = $this->Atwork->patchEntity($atwork, $this->request->getData());
            if ($this->Atwork->save($atwork)) {
                $this->Flash->success(__('The atwork has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atwork could not be saved. Please, try again.'));
        }
        $members = $this->Atwork->Members->find('list', ['limit' => 200]);
        $this->set(compact('atwork', 'members'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Atwork id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atwork = $this->Atwork->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atwork = $this->Atwork->patchEntity($atwork, $this->request->getData());
            if ($this->Atwork->save($atwork)) {
                $this->Flash->success(__('The atwork has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atwork could not be saved. Please, try again.'));
        }
        $members = $this->Atwork->Members->find('list', ['limit' => 200]);
        $this->set(compact('atwork', 'members'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Atwork id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atwork = $this->Atwork->get($id);
        if ($this->Atwork->delete($atwork)) {
            $this->Flash->success(__('The atwork has been deleted.'));
        } else {
            $this->Flash->error(__('The atwork could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
