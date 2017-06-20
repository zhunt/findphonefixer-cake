<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Languages Controller
 *
 * @property \App\Model\Table\LanguagesTable $Languages
 *
 * @method \App\Model\Entity\Language[] paginate($object = null, array $settings = [])
 */
class LanguagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $languages = $this->paginate($this->Languages);

        $this->set(compact('languages'));
        $this->set('_serialize', ['languages']);
    }

    /**
     * View method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $language = $this->Languages->get($id, [
            'contain' => ['Venues']
        ]);

        $this->set('language', $language);
        $this->set('_serialize', ['language']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $language = $this->Languages->newEntity();
        if ($this->request->is('post')) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            if ($this->Languages->save($language)) {
                $this->Flash->success(__('The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The language could not be saved. Please, try again.'));
        }
        $venues = $this->Languages->Venues->find('list', ['limit' => 200]);
        $this->set(compact('language', 'venues'));
        $this->set('_serialize', ['language']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $language = $this->Languages->get($id, [
            'contain' => ['Venues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            if ($this->Languages->save($language)) {
                $this->Flash->success(__('The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The language could not be saved. Please, try again.'));
        }
        $venues = $this->Languages->Venues->find('list', ['limit' => 200]);
        $this->set(compact('language', 'venues'));
        $this->set('_serialize', ['language']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $language = $this->Languages->get($id);
        if ($this->Languages->delete($language)) {
            $this->Flash->success(__('The language has been deleted.'));
        } else {
            $this->Flash->error(__('The language could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
