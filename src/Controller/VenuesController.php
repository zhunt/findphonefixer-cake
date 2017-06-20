<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Venues Controller
 *
 * @property \App\Model\Table\VenuesTable $Venues
 *
 * @method \App\Model\Entity\Venue[] paginate($object = null, array $settings = [])
 */
class VenuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains']
        ];
        $venues = $this->paginate($this->Venues);

        $this->set(compact('venues'));
        $this->set('_serialize', ['venues']);
    }

    /**
     * View method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => ['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains', 'Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes']
        ]);

        $this->set('venue', $venue);
        $this->set('_serialize', ['venue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venue = $this->Venues->newEntity();
        if ($this->request->is('post')) {
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());
            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $cities = $this->Venues->Cities->find('list', ['limit' => 200]);
        $countries = $this->Venues->Countries->find('list', ['limit' => 200]);
        $provinces = $this->Venues->Provinces->find('list', ['limit' => 200]);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200]);
        $malls = $this->Venues->Malls->find('list', ['limit' => 200]);
        $chains = $this->Venues->Chains->find('list', ['limit' => 200]);
        $amenities = $this->Venues->Amenities->find('list', ['limit' => 200]);
        $brands = $this->Venues->Brands->find('list', ['limit' => 200]);
        $cuisines = $this->Venues->Cuisines->find('list', ['limit' => 200]);
        $languages = $this->Venues->Languages->find('list', ['limit' => 200]);
        $products = $this->Venues->Products->find('list', ['limit' => 200]);
        $services = $this->Venues->Services->find('list', ['limit' => 200]);
        $venueTypes = $this->Venues->VenueTypes->find('list', ['limit' => 200]);
        $this->set(compact('venue', 'cities', 'countries', 'provinces', 'cityRegions', 'malls', 'chains', 'amenities', 'brands', 'cuisines', 'languages', 'products', 'services', 'venueTypes'));
        $this->set('_serialize', ['venue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => ['Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());
            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $cities = $this->Venues->Cities->find('list', ['limit' => 200]);
        $countries = $this->Venues->Countries->find('list', ['limit' => 200]);
        $provinces = $this->Venues->Provinces->find('list', ['limit' => 200]);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200]);
        $malls = $this->Venues->Malls->find('list', ['limit' => 200]);
        $chains = $this->Venues->Chains->find('list', ['limit' => 200]);
        $amenities = $this->Venues->Amenities->find('list', ['limit' => 200]);
        $brands = $this->Venues->Brands->find('list', ['limit' => 200]);
        $cuisines = $this->Venues->Cuisines->find('list', ['limit' => 200]);
        $languages = $this->Venues->Languages->find('list', ['limit' => 200]);
        $products = $this->Venues->Products->find('list', ['limit' => 200]);
        $services = $this->Venues->Services->find('list', ['limit' => 200]);
        $venueTypes = $this->Venues->VenueTypes->find('list', ['limit' => 200]);
        $this->set(compact('venue', 'cities', 'countries', 'provinces', 'cityRegions', 'malls', 'chains', 'amenities', 'brands', 'cuisines', 'languages', 'products', 'services', 'venueTypes'));
        $this->set('_serialize', ['venue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Venue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venue = $this->Venues->get($id);
        if ($this->Venues->delete($venue)) {
            $this->Flash->success(__('The venue has been deleted.'));
        } else {
            $this->Flash->error(__('The venue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
