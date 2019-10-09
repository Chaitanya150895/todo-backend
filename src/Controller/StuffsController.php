<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stuffs Controller
 *
 * @property \App\Model\Table\StuffsTable $Stuffs
 *
 * @method \App\Model\Entity\Stuff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StuffsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $stuffs = $this->paginate($this->Stuffs);

        $this->set(compact('stuffs'));
    }

    /**
     * View method
     *
     * @param string|null $id Stuff id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stuff = $this->Stuffs->get($id, [
            'contain' => []
        ]);

        $this->set('stuff', $stuff);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stuff = $this->Stuffs->newEntity();
        if ($this->request->is('post')) {
            $stuff = $this->Stuffs->patchEntity($stuff, $this->request->getData());
            if ($this->Stuffs->save($stuff)) {
                $this->Flash->success(__('The stuff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stuff could not be saved. Please, try again.'));
        }
        $this->set(compact('stuff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stuff id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stuff = $this->Stuffs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stuff = $this->Stuffs->patchEntity($stuff, $this->request->getData());
            if ($this->Stuffs->save($stuff)) {
                $this->Flash->success(__('The stuff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stuff could not be saved. Please, try again.'));
        }
        $this->set(compact('stuff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stuff id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stuff = $this->Stuffs->get($id);
        if ($this->Stuffs->delete($stuff)) {
            $this->Flash->success(__('The stuff has been deleted.'));
        } else {
            $this->Flash->error(__('The stuff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
