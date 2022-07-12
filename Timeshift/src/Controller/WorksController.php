<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $works = $this->Works->newEntity();
        if ($this->request->is('post')) {
            $works = $this->Works->patchEntity($works, $this->request->getData());
            if ($this->Works->save($works)) {
                $this->Flash->success(__('The works has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The works could not be saved. Please, try again.'));
        }
        $members = $this->Works->Members->find('list', ['limit' => 200]);
        $this->set(compact('works', 'members'));
    }

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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $works = $this->Works->patchEntity($works, $this->request->getData());
            if ($this->Works->save($works)) {
                $this->Flash->success(__('The works has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The works could not be saved. Please, try again.'));
        }
        $members = $this->Works->Members->find('list', ['limit' => 200]);
        $this->set(compact('works', 'members'));
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

        return $this->redirect(['action' => 'index']);
    }
}
