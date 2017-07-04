<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

use Cake\Core\Configure;

use Cake\Utility\Hash;

/**
 * Venues Controller
 *
 * @property \App\Model\Table\VenuesTable $Venues
 *
 * @method \App\Model\Entity\Venue[] paginate($object = null, array $settings = [])
 */
class VenuesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow( ['view']); // make these pages public

        $this->viewBuilder()->setLayout('default-admin');
    }


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
    public function view($slug = null)
    {

        $this->viewBuilder()->setLayout('default');

        $venue = $this->Venues->findBySlug($slug)
            ->contain(['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains', 'Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes'])
            ->where(['Venues.flag_published' => true ])
            ->first();


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
            $result=$this->Venues->save($venue);
            if ( $result) {
                $this->updateindex( $result->id);
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $cities = $this->Venues->Cities->find('list', ['limit' => 200, 'groupField' => 'province.name'])->contain(['Provinces'])->order(['Provinces.name', 'Cities.name']);
        $countries = $this->Venues->Countries->find('list', ['limit' => 200])->order('Countries.name');
        $provinces = $this->Venues->Provinces->find('list', ['limit' => 200, 'groupField' => 'country.name'])->contain('Countries')->order(['Countries.name', 'Provinces.name']);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200, 'groupField' => 'city.name'])->contain('Cities')->order(['Cities.name', 'CityRegions.name']);
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
            $this->uploadImageCloudinary($id); // handle uploading any images (only 1 for now)
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());
            if ($this->Venues->save($venue)) {
                $this->updateindex($id);
                $this->Flash->success(__('The venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venue could not be saved. Please, try again.'));
        }
        $cities = $this->Venues->Cities->find('list', ['limit' => 200, 'groupField' => 'province.name'])->contain(['Provinces'])->order(['Provinces.name', 'Cities.name']);
        $countries = $this->Venues->Countries->find('list', ['limit' => 200])->order('Countries.name');
        $provinces = $this->Venues->Provinces->find('list', ['limit' => 200, 'groupField' => 'country.name'])->contain('Countries')->order(['Countries.name', 'Provinces.name']);
        $cityRegions = $this->Venues->CityRegions->find('list', ['limit' => 200, 'groupField' => 'city.name'])->contain('Cities')->order(['Cities.name', 'CityRegions.name']);
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

        //$this->uploadImageCloudinary();
    }


    public function uploadImageCloudinary( $venueId = null ) {

        if ( !empty( $this->request->getData('upload_image_file') ) && is_array( $this->request->getData('upload_image_file')) ) {

            $filename = $this->request->getData('upload_image_file');
            //debug($filename);

            $uploadPath = WWW_ROOT . 'image_uploads';

            $dir = new Folder($uploadPath, true, 755);
            $tmp_file = new File($filename['tmp_name']);
            if (!$tmp_file->exists()) {
                return false;
            }
            $file = new File($dir->path . DS . $filename['name']);
            if (!$tmp_file->copy($dir->pwd() . DS . $filename['name'])) {
                return false;
            }
            $file->close();
            $tmp_file->delete();

            // now upload to Cloudinary

            $imageFilename = $uploadPath . DS.  $filename['name']; //debug($imageFilename);

            $tags = [ 'venue-' . $venueId, $imageFilename, $this->request->getData('slug')  ];

            $result =  \Cloudinary\Uploader::upload($imageFilename, [
                "cloud_name" => Configure::read('cloudinary.name'),
                "api_key" => Configure::read('cloudinary.apikey'),
                "api_secret" => Configure::read('cloudinary.apikeySecret'),
                'tags' => $tags,
                'eager' => [ 'width' => 555, 'height' => 415, 'crop' =>'fill' ]
            ]);

            if ($result) {
                $jsonImageData = json_encode([ 'image1' => $result['url'] ] ); //debug($jsonImageData);

                $this->request->data['photos'] = $jsonImageData; //debug( $this->request->getData() );
            }


        }


        /*
         * [
	'public_id' => 'eonzkyyarba5jm3cfw9d',
	'version' => (int) 1499064055,
	'signature' => '9bb65992a23564f2b1fb684a3e3032e3d55bb22b',
	'width' => (int) 800,
	'height' => (int) 640,
	'format' => 'png',
	'resource_type' => 'image',
	'created_at' => '2017-07-03T06:40:55Z',
	'tags' => [
		(int) 0 => 'test',
		(int) 1 => 'venue-123'
	],
	'bytes' => (int) 30642,
	'type' => 'upload',
	'etag' => 'd77ddd458eeb9fd0aeac602a31091629',
	'url' => 'http://res.cloudinary.com/yyztech-group-media/image/upload/v1499064055/eonzkyyarba5jm3cfw9d.png',
	'secure_url' => 'https://res.cloudinary.com/yyztech-group-media/image/upload/v1499064055/eonzkyyarba5jm3cfw9d.png',
	'original_filename' => 'areodrone-logo'
]
         */

    }


    /*
     * Updates or ads the Algolia Search index for this venue
     */
    public function updateindex($venueId) {
        $this->loadModel('Venues');

        $venues = $this->Venues->find()
            ->contain(['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains', 'Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes'])
            ->where(['Venues.flag_published' => true, 'Venues.id' => $venueId  ])
            ->limit(1);

        // debug($venues);

        $jsonArray = [];
        foreach ($venues as $venue) { //debug($venue);



            $jsonArray[] = [
                'objectID' =>  Configure::read('siteId') . '_' . $venue->id,
                'name' => trim($venue->name . ' '  . $venue->subname),
                'address' => ( !empty($venue->display_address) ? $venue->display_address : $venue->address ),
                'city_region' => ( isset($venue->city_region->name) ) ? $venue->city_region->name : '',
                'city' => $venue->city->name,
                'province' => $venue->province->name,
                'country' => $venue->country->name,
                'services' => $this->getVenueTypes($venue->services),
                'venue_types' => $this->getVenueTypes($venue->venue_types),
                'products' => $this->getVenueTypes($venue->products),
                'languages' => $this->getVenueTypes($venue->languages),
                'description' => substr($venue->description, 0,300 ),
                '_geoloc' => [
                    'lat' => floatval($venue->geo_latt),
                    'lng' => floatval($venue->geo_long),
                ],
                'phone' => ( !empty($venue->phone) ) ? json_decode($venue->phone)->phone : '',
                'venue_id' => $venue->id,
                'venue_slug' => $venue->slug
            ];
        }

        //$jsonArray = json_encode( $jsonArray);

        $client = new \AlgoliaSearch\Client(Configure::read('algolia.appId'), Configure::read('algolia.apikeySecret') );

        $index = $client->initIndex( Configure::read('algolia.indexName') );

        //$index->addObjects($jsonArray);

        $index->saveObjects($jsonArray);
        
    }

    public function getVenueTypes( $types) {
        if ( !isset($types[0]->name) ) return '';

        $results = Hash::extract($types, '{n}.name');

        $results = implode(', ' , $results);

        return $results;
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
