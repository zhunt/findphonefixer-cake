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

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow( ['home', 'city', 'filterService']); // make these pages public
    }

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


    public function filterService( $filterType = null, $slug = null, $city = null) {
        // debug( $filterType) ; debug( $slug );

        // e.g. http://localhost:8085/search/service/electrical-repairs/toronto
        // http://localhost:8085/search/product/mobile-phones/toronto
        // http://localhost:8085/search/language/korean/toronto
        // http://localhost:8085/search/brand/korean/toronto

        $this->loadModel('Venues');

        $filterArray['Venues.flag_published'] = true;

        $query = $this->Venues->find('all', ['fields' => [ 'id', 'name', 'sub_name', 'photos', 'address',  'display_address', 'slug'] ] )
            ->where([ 'Venues.flag_published' => true])
            ->contain([
                'VenueTypes',
                'Cities' => ['fields' => [ 'id', 'name', 'seo_title', 'seo_desc'] ]

            ])
            ->order('Venues.name');

        $searchTextPrefix = '';

        if ( !empty($city)) {
            $query->where(['Cities.slug' => $city]);
        }
        if ( $filterType == 'service') {
            $query->matching('Services', function ($q) use ($slug) {
                return $q->where( ['Services.slug' => $slug] );
            });
            $searchTextPrefix = 'With ' . $this->Venues->Services->findBySlug($slug)->first()->name;
        }

        if ( $filterType == 'product') {
            $query->matching('Products', function ($q) use ($slug) {
                return $q->where( ['Products.slug' => $slug] );
            });
            $searchTextPrefix = 'Selling ' . $this->Venues->Products->findBySlug($slug)->first()->name;
        }

        if ( $filterType == 'language') {
            $query->matching('Languages', function ($q) use ($slug) {
                return $q->where( ['Languages.slug' => $slug] );
            });

            $searchTextPrefix = 'Speaking ' . $this->Venues->Languages->findBySlug($slug)->first()->name;
        }

        if ( $filterType == 'brand') {
            $query->matching('Brands', function ($q) use ($slug) {
                return $q->where( ['Brands.slug' => $slug] );
            });

            $searchTextPrefix = 'Carrying ' . $this->Venues->Languages->findBySlug($slug)->first()->name;
        }

        $this->set('venues', $this->paginate($query));

        $this->set(compact('venues', 'searchTextPrefix' ));
        $this->set('_serialize', ['venues']);

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
