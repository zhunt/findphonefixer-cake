<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 *
 * @method \App\Model\Entity\City[] paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow( ['home', 'city', 'filter_service', 'filterVenues']); // make these pages public
    }


    public $paginate = [
        'Venues' => [ 'limit' => 20]
    ];


    public function filterVenues($slug = null) {

        $this->loadModel('Venues');

        $query = $this->Venues->find('all', ['fields' => [ 'id', 'name', 'sub_name', 'photos', 'address',  'display_address', 'slug'] ] )
            ->where([ 'Venues.flag_published' => true, 'Cities.slug' => $slug ])
            ->contain([
                'VenueTypes',
                'Cities' => ['fields' => [ 'id', 'name', 'seo_title', 'seo_desc'] ] ])
            ->order('Venues.name');

        $this->set('venues', $this->paginate($query));

        $this->set(compact('venues'));
        $this->set('_serialize', ['venues']);


    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Provinces', 'Countries']
        ];
        $cities = $this->paginate($this->Cities);

        $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => ['Provinces', 'Countries', 'CityRegions', 'Malls', 'Venues']
        ]);

        $this->set('city', $city);
        $this->set('_serialize', ['city']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->Cities->newEntity();
        if ($this->request->is('post')) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $provinces = $this->Cities->Provinces->find('list', ['limit' => 200]);
        $countries = $this->Cities->Countries->find('list', ['limit' => 200]);
        $this->set(compact('city', 'provinces', 'countries'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $provinces = $this->Cities->Provinces->find('list', ['limit' => 200]);
        $countries = $this->Cities->Countries->find('list', ['limit' => 200]);
        $this->set(compact('city', 'provinces', 'countries'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
