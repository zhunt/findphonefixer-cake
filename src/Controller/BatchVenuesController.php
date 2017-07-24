<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Utility\Inflector;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Utility\Hash;

use Composer\Config;
use League\Csv\Reader;




/**
 * BatchVenues Controller
 *
 *
 * @method \App\Model\Entity\BatchVenue[] paginate($object = null, array $settings = [])
 */
class BatchVenuesController extends AppController
{

    public $csvFile = '';
    public $fileOffset = 0;

    public $wwwRoot = WWW_ROOT;

    public function initialize()
    {
        parent::initialize();
        //$this->Auth->allow( ['index', 'add', 'loadCsvFile', 'load-csv-file', 'updateindex' ]); // make these pages public FOR NOW

        $this->viewBuilder()->setLayout('default-admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Venues');
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
     * @param string|null $id Batch Venue id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $batchVenue = $this->BatchVenues->get($id, [
            'contain' => []
        ]);

        $this->set('batchVenue', $batchVenue);
        $this->set('_serialize', ['batchVenue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Venues');


        $venue = $this->Venues->newEntity();
        if ($this->request->is('post')) {
            $venue = $this->Venues->patchEntity($venue, $this->request->getData());

            $result= $this->Venues->save($venue);
            if ($result) {
                $this->updateindex( $result->id);

                $this->Flash->success(__('The venue has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect(['action' => 'add',
                        'file_offset' => intval($this->request->getQuery('file_offset') )+ 1 ,
                        'filename' => $this->request->getQuery('filename') ] );
            }
            $this->Flash->error(__('The batch venue could not be saved. Please, try again.'));
        }


        // load in the CSV file with offset
        $currentRow = '';
        if ( $this->request->getQuery('filename') ) {

            $currentRow = $this->getCurrentCsvRow();

            $venue = $this->populateVenueTable($venue, $currentRow);



           // debug($venue);


            $venue['country_id'] = $this->request->getQuery('country_id');
            $venue['province_id'] = $this->request->getQuery('province_id');
            $venue['city_id'] = $this->request->getQuery('city_id');
            $venue['city_region_id'] = $this->request->getQuery('city_region_id');

            $venue['geo_latt'] = $this->request->getQuery('lat');
            $venue['geo_long'] = $this->request->getQuery('lng');





        }

        //debug($currentRow);



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

        // file_offset=3&filename=yelp-scrap-canada.csv


        $this->set(compact('venue', 'cities', 'countries', 'provinces', 'cityRegions', 'malls', 'chains', 'amenities', 'brands', 'cuisines', 'languages', 'products', 'services', 'venueTypes'));
        $this->set('_serialize', ['venue']);
    }

    // if file has been uploaded, pass it's name and offset back to form in query string
    public function loadCsvFile(){



      //  debug($this->request->getData() );
      //  debug($this->request->getQuery() );
        $this->autoRender = false;
        $result = $this->uploadFile( ['csv_files'] , $this->request->getData('csv_file') );
        if (!$result) exit;

        return $this->redirect(['action' => 'add',
            'file_offset' => intval($this->request->getData('file_offset') ),
            'filename' => $this->request->getData('csv_file.name')  ]);

    }

    // methods used by loadCvsFile
    public function uploadDir($path = array()) {
        return $this->wwwRoot . implode(DS, $path);
    }

    public function uploadFile($path = array(), $filetoupload = null) { //debug($path); debug($filetoupload);
        if (!$filetoupload) {
            return false;
        }

        $dir = new Folder($this->uploadDir($path), true, 755);
        $tmp_file = new File($filetoupload['tmp_name']);
        if (!$tmp_file->exists()) {
            return false;
        }
        $file = new File($dir->path . DS . $filetoupload['name']);
        if (!$tmp_file->copy($dir->pwd() . DS . $filetoupload['name'])) {
            return false;
        }
        $file->close();
        $tmp_file->delete();
        return true;
    }


    // Open CSV file up and return array of current row in file
    // reads filename and offset from query string
    public function getCurrentCsvRow() {

        $filename = $this->request->getQuery('filename');
        $fileRowOffset = $this->request->getQuery('file_offset');

        //debug(  WWW_ROOT  . 'csv_files' . DS .  $filename );

        $reader = Reader::createFromPath(WWW_ROOT  . 'csv_files' . DS .  $filename );

        $keys = [ '﻿Source' ,'Category','Name', 'Address','Location','Phone', 'Website','SmallDesc', 'LongDesc',
            'Monday','MondayClose', 'Tuesday', 'TuesdayClose', 'Wednesday', 'WednesdayClose', 'Thursday',
            'ThursdayClose', 'Friday','FridayClose','Saturday', 'SaturdayClose','Sunday', 'SundayClose'];

        foreach ($reader->fetchAssoc($keys) as $i => $row) {
            if ($i< $fileRowOffset ) continue;

            return $row;
            break;
        }

    }

    // reads data from array (from csv file)
    public function populateVenueTable($venue, $currentRow) {

        $productsServices = $this->getProductsServcies($currentRow['Category']); // array of both split

        //debug($productsServices);


        $data = [
            'name' => $currentRow['Name'],
            'slug' => Inflector::slug( strtolower($currentRow['Name'])),
            'address' => trim( preg_replace('/\s+/', ' ', $currentRow['Address'])) ,

            'phone' => json_encode( [ 'phone' => $currentRow['Phone'] ] ),
            'website' => json_encode( [ 'url' => $currentRow['Website'] ] ),
            'hours_sun' => $currentRow['Sunday'] . ' - ' . $currentRow['SundayClose'],
            'hours_mon' => $currentRow['Monday'] . ' - ' . $currentRow['MondayClose'],
            'hours_tue' => $currentRow['Tuesday'] . ' - ' . $currentRow['TuesdayClose'],
            'hours_wed' => $currentRow['Wednesday'] . ' - ' . $currentRow['WednesdayClose'],
            'hours_thu' => $currentRow['Thursday'] . ' - ' . $currentRow['ThursdayClose'],
            'hours_fri' => $currentRow['Friday'] . ' - ' . $currentRow['FridayClose'],
            'hours_sat' => $currentRow['Saturday'] . ' - ' . $currentRow['SaturdayClose'],

            'description' => trim( $currentRow['LongDesc'] ),

            'services' => $productsServices['services'],
            'products' => $productsServices['products'],


            'venue_types' => [ '_ids' => [ 1 ] ],  // default to store

            'city_id' => $this->request->getQuery('cityId')


        ];

        //debug($data);

        /*
         * 'amenities' => [
		'_ids' => [
			(int) 0 => '1',
			(int) 1 => '2'
		]
	],
	'brands' => [
		'_ids' => [
			(int) 0 => '2'
		]
	],
	'cuisines' => [
		'_ids' => [
			(int) 0 => '1'
		]
	],
	'languages' => [
		'_ids' => [
			(int) 0 => '3'
		]
	],
	'products' => [
		'_ids' => [
			(int) 0 => '26'
		]
	],
	'services' => [
		'_ids' => [
			(int) 0 => '26',
			(int) 1 => '5'
		]
	],
	'venue_types' => [
		'_ids' => [
			(int) 0 => '2'
		]
	]
         *
         */


        $venue = $this->Venues->patchEntity($venue, $data  );
        return $venue;
    }



    public function geocodeAddress() {

        $this->autoRender = false;

        //  TEMP turn of encoding
        $address = $this->request->getQuery('encodeAddress'); //debug($address);

        //exit;

        $url ='https://maps.googleapis.com/maps/api/geocode/json';

        $http = new Client();

        // now geocode the address and

        $response = $http->get($url, ['address' => $address ] );

        if ( !$response->isOk() ) { debug($response); exit; }

        //debug($response->body);

        $addressBody = json_decode( $response->body  ); //debug($addressBody);

        // get basic full address and geo-cords
        $fullAddress = $addressBody->results[0]->formatted_address;
        $lattLong = $addressBody->results[0]->geometry->location;


        $addressParts = $addressBody->results[0]->address_components;

        $country = '';

        $province = '';
        $city = '';
        $cityRegion = '';

        foreach( $addressParts as $i => $row) {

            if ( in_array('country',$row->types) ) {
                $country = $row->long_name;
            }

            if ( in_array('administrative_area_level_1',$row->types) &&  in_array('political',$row->types)  ) {
                $province = $row->long_name;
            }

            if ( in_array('locality',$row->types) &&  in_array('political',$row->types)  ) {
                $city = $row->long_name;
            }
            if (!$city) {
                if ( in_array('postal_town',$row->types) ) {
                    $city = $row->long_name;
                }
            }

            if ( in_array('sublocality',$row->types) &&  in_array('political',$row->types) && in_array('sublocality_level_1',$row->types)  ) {
                $cityRegion = $row->long_name;
            }
            if (!$cityRegion) {
                if ( in_array('neighborhood',$row->types) &&  in_array('political',$row->types)  ) {
                    $cityRegion = $row->long_name;
                }
            }

        }

        // special case for New York
        if ( empty($city) && $province == 'New York') {

            foreach( $addressParts as $i => $row) {
                if (in_array('political', $row->types) && in_array('sublocality', $row->types) && in_array('sublocality_level_1', $row->types)) {
                    $city = $row->long_name;

                }
                if (in_array('neighborhood', $row->types) && in_array('political', $row->types)) {
                    $cityRegion = $row->long_name;
                }
            }
        }


        // now save the address parts
        $data = $this->saveAddressParts( $country, $province, $city, $cityRegion ); // /* $lattLong->lat, $lattLong->lng */

//debug($data ); exit;



        //$result = $this->uploadFile( ['csv_files'] , $this->request->getData('csv_file') );
        //if (!$result) exit;

        return $this->redirect( ['action' => 'add',
            'file_offset' => intval($this->request->getQuery('file_offset') ),
            'filename' => $this->request->getQuery('filename'),
            'country_id' => $data['countryId'],
            'province_id' => $data['provinceId'],
            'city_id' => $data['cityId'],
            'city_region_id' => $data['cityRegionId'],
            'lat' => $lattLong->lat,
            'lng' => $lattLong->lng
        ]);


        /*
    'countryId' => (int) 5,
	'provinceId' => (int) 11,
	'provinceRegionId' => (int) 0,
	'cityId' => (int) 82,
	'cityRegionId' => (int) 31
         */


    }


    public function saveAddressParts( $country, $province, $city, $cityRegion = null, $geoLat = null, $geoLng = null ) {


        $data = [
            'country' => $country,
            'province' => $province,
            //'provinceRegion' => $provinceRegion,
            //'provinceRegionLatt' => $provinceRegionLatt,
            //'provinceRegionLong' => $provinceRegionLong,
            'city' => $city,
            //'cityLatt' => $cityLatt,
            //'cityLong' => $cityLong,
            'cityRegion' => $cityRegion,
            //'cityRegionLatt' => $cityRegionLatt,
            //'cityRegionLong' => $cityRegionLong,
            //'admin3' => $adminRegion3,
            //'admin4' => $adminRegion4,
            //'admin5' => $adminRegion5,
            'geoLatt' => $geoLat,
            'geoLong' => $geoLng
        ];


       // debug($data); // exit;
        $this->loadComponent('Geocode');

        $data = $this->Geocode->saveGeoData($data);

        return $data;

        //debug($result);

        // save previminary venue data



    }

    // parses string of services offered, returns array of
    public function getProductsServcies($row) {

        //debug($row);
        // Computers, Mobile Phones, IT Services & Computer & Laptop Repair
        // Mobile Phones, Electrical Repairs, Mobile Phone Repair

        //$row = trim('Mobile Phones, Electrical Repairs, Mobile Phone Repair, Computers, IT Services & Computer & Laptop Repair');

        $phrases = explode(',' , $row );

        $this->loadModel('Products');
        $productsIds =[];
        foreach( $phrases as $term ) {
            $result = $this->Products->findByName( trim($term) )->first();
            if ($result) {
                $productsIds[] = (string)$result->id;
            }
        }

        $this->loadModel('Services');
        $servicesIds =[];
        foreach( $phrases as $term ) {
            $result = $this->Services->findByName( trim($term) )->first();
            if ($result) {
                $servicesIds[] = (string)$result->id;
            }
        }

        // ... add more for cuisines, etc.

        $services['_ids'] = $servicesIds;
        $products['_ids'] = $productsIds;

        $productsServices = ['services' => $services, 'products' => $products ];

        return($productsServices);
    }





    public function updateindex( $id = null) {
        $this->loadModel('Venues');

        if ( empty($id)) {
            $venues = $this->Venues->find()
                ->contain(['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains', 'Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes'])
                ->where(['Venues.flag_published' => true ])
                ->limit(10);
        } else {
            $venues = $this->Venues->find()
                ->contain(['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains', 'Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes'])
                ->where(['Venues.flag_published' => true, 'Venues.id' => $id  ])
                ->limit(1);
        }


      // debug($venues);

        $jsonArray = [];
        foreach ($venues as $venue) { // debug($venue);



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

        //debug($jsonArray);


        $client = new \AlgoliaSearch\Client(Configure::read('algolia.appId'), Configure::read('algolia.apikeySecret') );

        //debug($client);

        $index = $client->initIndex( Configure::read('algolia.indexName') );

        //debug($index);

        //$index->addObjects($jsonArray);

        $index->saveObjects($jsonArray);


       // debug('here 1');


    }


    public function getVenueTypes( $types) {
        if ( !isset($types[0]->name) ) return '';

        $results = Hash::extract($types, '{n}.name');

        $results = implode(', ' , $results);

        return $results;
    }

    /*
'services' => [
		(int) 0 => object(App\Model\Entity\Service) {

			'id' => (int) 11,
			'name' => 'Mobile Phone Repair',
			'slug' => 'mobile-phone-repair',
			'created' => object(Cake\I18n\FrozenTime) {
 */


    /**
     * Edit method
     *
     * @param string|null $id Batch Venue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $batchVenue = $this->BatchVenues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batchVenue = $this->BatchVenues->patchEntity($batchVenue, $this->request->getData());
            if ($this->BatchVenues->save($batchVenue)) {
                $this->Flash->success(__('The batch venue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The batch venue could not be saved. Please, try again.'));
        }
        $this->set(compact('batchVenue'));
        $this->set('_serialize', ['batchVenue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Batch Venue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $batchVenue = $this->BatchVenues->get($id);
        if ($this->BatchVenues->delete($batchVenue)) {
            $this->Flash->success(__('The batch venue has been deleted.'));
        } else {
            $this->Flash->error(__('The batch venue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
