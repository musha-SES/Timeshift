<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LgWork Controller
 *
 * @property \App\Model\Table\LgWorkTable $LgWork
 *
 * @method \App\Model\Entity\LgWork[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LgWorkController extends AppController
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
        $lgWork = $this->paginate($this->LgWork);

        $this->set(compact('lgWork'));
    }

    /**
     * View method
     *
     * @param string|null $id Lg Work id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lgWork = $this->LgWork->get($id, [
            'contain' => ['Members'],
        ]);

        $this->set('lgWork', $lgWork);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lgWork = $this->LgWork->newEntity();
        if ($this->request->is('post')) {
            $lgWork = $this->LgWork->patchEntity($lgWork, $this->request->getData());
            if ($this->LgWork->save($lgWork)) {
                $this->Flash->success(__('The lg work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lg work could not be saved. Please, try again.'));
        }
        $members = $this->LgWork->Members->find('list', ['limit' => 200]);
        $this->set(compact('lgWork', 'members'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lg Work id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lgWork = $this->LgWork->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lgWork = $this->LgWork->patchEntity($lgWork, $this->request->getData());
            if ($this->LgWork->save($lgWork)) {
                $this->Flash->success(__('The lg work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lg work could not be saved. Please, try again.'));
        }
        $members = $this->LgWork->Members->find('list', ['limit' => 200]);
        $this->set(compact('lgWork', 'members'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lg Work id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lgWork = $this->LgWork->get($id);
        if ($this->LgWork->delete($lgWork)) {
            $this->Flash->success(__('The lg work has been deleted.'));
        } else {
            $this->Flash->error(__('The lg work could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
