<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LandingPage Controller
 *
 *
 * @method \App\Model\Entity\LandingPage[] paginate($object = null, array $settings = [])
 */
class LandingPageController extends AppController
{

    public function home()
    {
        //$landingPage = $this->paginate($this->LandingPage);

        $this->set(compact('landingPage'));
        $this->set('_serialize', ['landingPage']);
    }


    public function city($slug = null)
    {
        $this->loadModel('Cities');

        $city = $this->Cities->findBySlug($slug)
            ->contain([
                'Countries' => ['fields' => ['name'] ],
                'Provinces' => ['fields' => ['name'] ],
                'CityRegions' => [ 'sort' => 'display_name, name', 'fields' => [ 'city_id', 'name', 'display_name', 'slug'] ]
            ])
            ->first(); //debug($city->toArray() );


        // TODO: make services, chains dependent on what venues in have assigned to them

        $this->set(compact('city'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $landingPage = $this->paginate($this->LandingPage);

        $this->set(compact('landingPage'));
        $this->set('_serialize', ['landingPage']);
    }

    /**
     * View method
     *
     * @param string|null $id Landing Page id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $landingPage = $this->LandingPage->get($id, [
            'contain' => []
        ]);

        $this->set('landingPage', $landingPage);
        $this->set('_serialize', ['landingPage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $landingPage = $this->LandingPage->newEntity();
        if ($this->request->is('post')) {
            $landingPage = $this->LandingPage->patchEntity($landingPage, $this->request->getData());
            if ($this->LandingPage->save($landingPage)) {
                $this->Flash->success(__('The landing page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The landing page could not be saved. Please, try again.'));
        }
        $this->set(compact('landingPage'));
        $this->set('_serialize', ['landingPage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Landing Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $landingPage = $this->LandingPage->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $landingPage = $this->LandingPage->patchEntity($landingPage, $this->request->getData());
            if ($this->LandingPage->save($landingPage)) {
                $this->Flash->success(__('The landing page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The landing page could not be saved. Please, try again.'));
        }
        $this->set(compact('landingPage'));
        $this->set('_serialize', ['landingPage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Landing Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $landingPage = $this->LandingPage->get($id);
        if ($this->LandingPage->delete($landingPage)) {
            $this->Flash->success(__('The landing page has been deleted.'));
        } else {
            $this->Flash->error(__('The landing page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
