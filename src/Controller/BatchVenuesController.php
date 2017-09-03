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



/*
 * Notes:
 * start here to import CSV file into JSON
 * http://localhost:8085/batch-venues/import-venues-csv  #this will create an editable json file to import
 *
 * Load in JSON file and save to DB
 * http://localhost:8085/batch-venues/save-json-file?filename=houston-phones-only.csv #filename with .json
 *
 */


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

            $result = $this->Venues->save($venue);
            if ($result) {
                $this->updateindex($result->id);

                $this->Flash->success(__('The venue has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect(['action' => 'add',
                    'file_offset' => intval($this->request->getQuery('file_offset')) + 1,
                    'filename' => $this->request->getQuery('filename')]);
            }
            $this->Flash->error(__('The batch venue could not be saved. Please, try again.'));
        }


        // load in the CSV file with offset
        $currentRow = '';
        if ($this->request->getQuery('filename')) {

            $currentRow = $this->getCurrentCsvRow();

            $venue = $this->populateVenueTable($venue, $currentRow);


            $venue['country_id'] = $this->request->getQuery('country_id');
            $venue['province_id'] = $this->request->getQuery('province_id');
            $venue['city_id'] = $this->request->getQuery('city_id');
            $venue['city_region_id'] = $this->request->getQuery('city_region_id');

            $venue['geo_latt'] = $this->request->getQuery('lat');
            $venue['geo_long'] = $this->request->getQuery('lng');


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

        // file_offset=3&filename=yelp-scrap-canada.csv


        $this->set(compact('venue', 'cities', 'countries', 'provinces', 'cityRegions', 'malls', 'chains', 'amenities', 'brands', 'cuisines', 'languages', 'products', 'services', 'venueTypes'));
        $this->set('_serialize', ['venue']);
    }

    // if file has been uploaded, pass it's name and offset back to form in query string
    public function loadCsvFile()
    {

        $this->autoRender = false;
        $result = $this->uploadFile(['csv_files'], $this->request->getData('csv_file'));
        if (!$result) exit;

        return $this->redirect(['action' => 'add',
            'file_offset' => intval($this->request->getData('file_offset')),
            'filename' => $this->request->getData('csv_file.name')]);

    }

    // methods used by loadCvsFile
    public function uploadDir($path = array())
    {
        return $this->wwwRoot . implode(DS, $path);
    }

    public function uploadFile($path = array(), $filetoupload = null)
    {
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
    public function getCurrentCsvRow()
    {
        $filename = $this->request->getQuery('filename');
        $fileRowOffset = $this->request->getQuery('file_offset');

        $reader = Reader::createFromPath(WWW_ROOT . 'csv_files' . DS . $filename);

        $keys = ['﻿Source', 'Category', 'Name', 'Address', 'Location', 'Phone', 'Website', 'SmallDesc', 'LongDesc',
            'Monday', 'MondayClose', 'Tuesday', 'TuesdayClose', 'Wednesday', 'WednesdayClose', 'Thursday',
            'ThursdayClose', 'Friday', 'FridayClose', 'Saturday', 'SaturdayClose', 'Sunday', 'SundayClose'];

        foreach ($reader->fetchAssoc($keys) as $i => $row) {
            if ($i < $fileRowOffset) continue;

            return $row;
            break;
        }

    }

    // reads data from array (from csv file)
    public function populateVenueTable($venue, $currentRow)
    {
        $productsServices = $this->getProductsServcies($currentRow['Category']); // array of both split

        $data = [
            'name' => $currentRow['Name'],
            'slug' => Inflector::slug(strtolower($currentRow['Name'])),
            'address' => trim(preg_replace('/\s+/', ' ', $currentRow['Address'])),

            'phone' => json_encode(['phone' => $currentRow['Phone']]),
            'website' => json_encode(['url' => $currentRow['Website']]),
            'hours_sun' => $currentRow['Sunday'] . ' - ' . $currentRow['SundayClose'],
            'hours_mon' => $currentRow['Monday'] . ' - ' . $currentRow['MondayClose'],
            'hours_tue' => $currentRow['Tuesday'] . ' - ' . $currentRow['TuesdayClose'],
            'hours_wed' => $currentRow['Wednesday'] . ' - ' . $currentRow['WednesdayClose'],
            'hours_thu' => $currentRow['Thursday'] . ' - ' . $currentRow['ThursdayClose'],
            'hours_fri' => $currentRow['Friday'] . ' - ' . $currentRow['FridayClose'],
            'hours_sat' => $currentRow['Saturday'] . ' - ' . $currentRow['SaturdayClose'],

            'description' => trim($currentRow['LongDesc']),

            'services' => $productsServices['services'],
            'products' => $productsServices['products'],

            'venue_types' => ['_ids' => [1]],  // default to store

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


        $venue = $this->Venues->patchEntity($venue, $data);
        return $venue;
    }


    /*
     * Tries to geo-code address, handle some special conditions (e.g. cities like New York), then
     * hand data over to saveAddressParts() to save into database
     */
    public function geocodeAddress( $address = null, $redirect = true )
    {

        $this->autoRender = false;

        //  TEMP turn off encoding
        if ( empty($address)) {
            $address = $this->request->getQuery('encodeAddress'); //debug($address);
        }


        //exit;

        $url = 'https://maps.googleapis.com/maps/api/geocode/json';

        $http = new Client();

        // now geocode the address and

        $response = $http->get($url, ['address' => $address]);

        if (!$response->isOk()) {
            debug($response);
            exit;
        }

        //debug($response->body);

        $addressBody = json_decode($response->body); //debug($addressBody);

        // get basic full address and geo-cords
        $fullAddress = $addressBody->results[0]->formatted_address;
        $lattLong = $addressBody->results[0]->geometry->location;


        $addressParts = $addressBody->results[0]->address_components;

        $country = '';

        $province = '';
        $city = '';
        $cityRegion = '';

        foreach ($addressParts as $i => $row) {

            if (in_array('country', $row->types)) {
                $country = $row->long_name;
            }

            if (in_array('administrative_area_level_1', $row->types) && in_array('political', $row->types)) {
                $province = $row->long_name;
            }

            if (in_array('locality', $row->types) && in_array('political', $row->types)) {
                $city = $row->long_name;
            }
            if (!$city) {
                if (in_array('postal_town', $row->types)) {
                    $city = $row->long_name;
                }
            }

            if (in_array('sublocality', $row->types) && in_array('political', $row->types) && in_array('sublocality_level_1', $row->types)) {
                $cityRegion = $row->long_name;
            }
            if (!$cityRegion) {
                if (in_array('neighborhood', $row->types) && in_array('political', $row->types)) {
                    $cityRegion = $row->long_name;
                }
            }

        }

        // special case for New York
        if (empty($city) && $province == 'New York') {

            foreach ($addressParts as $i => $row) {
                if (in_array('political', $row->types) && in_array('sublocality', $row->types) && in_array('sublocality_level_1', $row->types)) {
                    $city = $row->long_name;

                }
                if (in_array('neighborhood', $row->types) && in_array('political', $row->types)) {
                    $cityRegion = $row->long_name;
                }
            }
        }


        // now save the address parts
        $data = $this->saveAddressParts($country, $province, $city, $cityRegion); // /* $lattLong->lat, $lattLong->lng */




        if ( $redirect === false ) {

            $data = array_merge($data, ['geoLatt' => $lattLong->lat,'geoLong' => $lattLong->lng] );
            return($data); // just sent the saved data back - probably called from another function
        }

//debug($data ); exit;


        //$result = $this->uploadFile( ['csv_files'] , $this->request->getData('csv_file') );
        //if (!$result) exit;

        return $this->redirect(['action' => 'add',
            'file_offset' => intval($this->request->getQuery('file_offset')),
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


    /*
     * After geo-coding address, this saves addociated cities, provinces, etc.
     */
    public function saveAddressParts($country, $province, $city, $cityRegion = null, $geoLat = null, $geoLng = null)
    {


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

    /*
     * Parses string of services offered, returns array with IDs for services, products arrays inside it.
     * Does not add new products or services, just looks up exiting ones.
    */
    public function getProductsServcies($row)
    {

        //debug($row);
        // Computers, Mobile Phones, IT Services & Computer & Laptop Repair
        // Mobile Phones, Electrical Repairs, Mobile Phone Repair

        //$row = trim('Mobile Phones, Electrical Repairs, Mobile Phone Repair, Computers, IT Services & Computer & Laptop Repair');

        $phrases = explode(',', $row);

        $this->loadModel('Products');
        $productsIds = [];
        foreach ($phrases as $term) {
            $result = $this->Products->findByName(trim($term))->first();
            if ($result) {
                $productsIds[] = (string)$result->id;
            }
        }

        $this->loadModel('Services');
        $servicesIds = [];
        foreach ($phrases as $term) {
            $result = $this->Services->findByName(trim($term))->first();
            if ($result) {
                $servicesIds[] = (string)$result->id;
            }
        }

        // ... add more for cuisines, etc.

        $services['_ids'] = $servicesIds;
        $products['_ids'] = $productsIds;

        $productsServices = ['services' => $services, 'products' => $products];

        return ($productsServices);
    }


    /*
     * Update the AlgoliaSearch index data for the current entry
     */
    public function updateindex($id = null)
    {
        $this->loadModel('Venues');

        if (empty($id)) {
            $venues = $this->Venues->find()
                ->contain(['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains', 'Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes'])
                ->where(['Venues.flag_published' => true])
                ->limit(10);
        } else {
            $venues = $this->Venues->find()
                ->contain(['Cities', 'Countries', 'Provinces', 'CityRegions', 'Malls', 'Chains', 'Amenities', 'Brands', 'Cuisines', 'Languages', 'Products', 'Services', 'VenueTypes'])
                ->where(['Venues.flag_published' => true, 'Venues.id' => $id])
                ->limit(1);
        }


        // debug($venues);

        $jsonArray = [];
        foreach ($venues as $venue) { // debug($venue);


            $jsonArray[] = [
                'objectID' => Configure::read('siteId') . '_' . $venue->id,
                'name' => trim($venue->name . ' ' . $venue->subname),
                'address' => (!empty($venue->display_address) ? $venue->display_address : $venue->address),
                'city_region' => (isset($venue->city_region->name)) ? $venue->city_region->name : '',
                'city' => $venue->city->name,
                'province' => $venue->province->name,
                'country' => $venue->country->name,
                'services' => $this->getVenueTypes($venue->services),
                'venue_types' => $this->getVenueTypes($venue->venue_types),
                'products' => $this->getVenueTypes($venue->products),
                'languages' => $this->getVenueTypes($venue->languages),
                'description' => substr($venue->description, 0, 300),
                '_geoloc' => [
                    'lat' => floatval($venue->geo_latt),
                    'lng' => floatval($venue->geo_long),
                ],
                'phone' => (!empty($venue->phone)) ? json_decode($venue->phone)->phone : '',
                'venue_id' => $venue->id,
                'venue_slug' => $venue->slug
            ];
        }

        //$jsonArray = json_encode( $jsonArray);

        //debug($jsonArray);


        $client = new \AlgoliaSearch\Client(Configure::read('algolia.appId'), Configure::read('algolia.apikeySecret'));

        //debug($client);

        $index = $client->initIndex(Configure::read('algolia.indexName'));

        //debug($index);

        //$index->addObjects($jsonArray);

        $index->saveObjects($jsonArray);


        // debug('here 1');


    }


    public function getVenueTypes($types)
    {
        if (!isset($types[0]->name)) return '';

        $results = Hash::extract($types, '{n}.name');

        $results = implode(', ', $results);

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
    /*
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
*/
    /**
     * Delete method
     *
     * @param string|null $id Batch Venue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
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
    */

    /*
     * Allow adding up to 10 locations in one go
     * User fills out overall name, selects chain name, features, services, etc., hours, individual contact info
     * and address. Funtion tries to save all, sets to unpublished.
     */
    public function addSmallChain()
    {

    }

    /*
     * Crawl a chain's listings and output a json file with data
     */


    /*
     * Read an uploaded json file and put into database. Look for duplicates based on phone number.
     */


    /*
     * This uploads a scraped CSV file for precessing in next step
     * note: mostly a copy of "add" method
     */
    public function importVenuesCsv() {

        $this->loadModel('Venues');
        $venue = $this->Venues->newEntity();

/*

            if ($this->request->is('post')) {
                $venue = $this->Venues->patchEntity($venue, $this->request->getData());

                $result = $this->Venues->save($venue);
                if ($result) {
                    $this->updateindex($result->id);

                    $this->Flash->success(__('The venue has been saved.'));

                    // return $this->redirect(['action' => 'index']);
                    return $this->redirect(['action' => 'add',
                        'file_offset' => intval($this->request->getQuery('file_offset')) + 1,
                        'filename' => $this->request->getQuery('filename')]);
                }
                $this->Flash->error(__('The batch venue could not be saved. Please, try again.'));
            }

*/


            // load in the CSV file with offset
            $currentRow = '';
            if ($this->request->getQuery('filename')) {

                $currentRow = $this->getCurrentCsvRow();

                // debug($currentRow);

                if ($currentRow != null ) {
                    // process this row
                    $jsonCode = $this->processVenueCsv($currentRow);

                    // open the file up and save out

                    $newFile = $this->request->getQuery('filename') ? $this->request->getQuery('filename') : 'temp_file';
                    $newFile = $newFile . '.json';

                    $file = new File( WWW_ROOT . 'csv_files' . DS . $newFile);
                    $file->append( json_encode($jsonCode) . ",\n" );
                    $file->close();
                    echo  'Offset: '.  intval($this->request->getQuery('file_offset')) . ' File updated';
                    //$reader = Reader::createFromPath(WWW_ROOT . 'csv_files' . DS . $filename);



                    // later, increase offset, re-direct back to /import-venues-csv?file_offset=5&filename=london-ont.csv

                    $offset = intval($this->request->getQuery('file_offset')) + 1;
                    $csvFile = $this->request->getQuery('filename');


                    echo "<a href=\"/batch-venues/import-venues-csv?file_offset={$offset}&filename={$csvFile}\">Submit, Offset: {$offset}</a>";
                    exit;


                }
                echo 'End of file';

                $csvFile = $this->request->getQuery('filename');
                echo "<p><a href=\"/batch-venues/save-json-file?filename={$csvFile}\">Click Here to import file.</a></p>";

               // $venue = $this->populateVenueTable($venue, $currentRow);


                exit;
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


            $this->set(compact('venue'));
            $this->set('_serialize', ['venue']);
        }

        // if file has been uploaded, pass it's name and offset back to form in query string
        public function loadCsvFileVenues()
        {

            //  debug($this->request->getData() );
            //  debug($this->request->getQuery() );
            $this->autoRender = false;
            $result = $this->uploadFile(['csv_files'], $this->request->getData('csv_file'));
            if (!$result) exit;

            return $this->redirect(['action' => 'importVenuesCsv',
                'file_offset' => intval($this->request->getData('file_offset')) > 0 ? intval($this->request->getData('file_offset')) : 3 ,
                'filename' => $this->request->getData('csv_file.name')]);

        }

        function processVenueCsv($currentRow) {

            $productsServices = $this->getProductsServcies($currentRow['Category']);

            $data = [
                'name' => $currentRow['Name'],
                'slug' => Inflector::slug(strtolower($currentRow['Name'])),
                'address' => trim(preg_replace('/\s+/', ' ', $currentRow['Address'])),

                'phone' => $currentRow['Phone'],
                'checkcode' => 0,
                'chain' => '',
                'website' => $currentRow['Website'],
                'hours_sun' => ( $currentRow['Sunday'] == 'Closed') ? 'Closed' : date("g:i a", strtotime($currentRow['Sunday'])) . ' - ' . date("g:i a", strtotime($currentRow['SundayClose'])), // $currentRow['SundayClose'],
                'hours_mon' => ( $currentRow['Monday'] == 'Closed') ? 'Closed' : date("g:i a", strtotime($currentRow['Monday'])) . ' - ' . date("g:i a", strtotime($currentRow['MondayClose'])), // $currentRow['MondayClose'],
                'hours_tue' => ( $currentRow['Tuesday'] == 'Closed') ? 'Closed' : date("g:i a", strtotime($currentRow['Tuesday'])) . ' - ' . date("g:i a", strtotime($currentRow['TuesdayClose'])), // $currentRow['TuesdayClose'],
                'hours_wed' => ( $currentRow['Wednesday'] == 'Closed') ? 'Closed' : date("g:i a", strtotime($currentRow['Wednesday'])) . ' - ' . date("g:i a", strtotime($currentRow['WednesdayClose'])), // $currentRow['WednesdayClose'],
                'hours_thu' => ( $currentRow['Thursday'] == 'Closed') ? 'Closed' : date("g:i a", strtotime($currentRow['Thursday'])) . ' - ' . date("g:i a", strtotime($currentRow['ThursdayClose'])), // $currentRow['ThursdayClose'],
                'hours_fri' => ( $currentRow['Friday'] == 'Closed') ? 'Closed' : date("g:i a", strtotime($currentRow['Friday'])) . ' - ' . date("g:i a", strtotime($currentRow['FridayClose'])), // $currentRow['FridayClose'],
                'hours_sat' => ( $currentRow['Sunday'] == 'Closed') ? 'Closed' : date("g:i a", strtotime($currentRow['Saturday'])) . ' - ' . date("g:i a", strtotime($currentRow['SaturdayClose'])), // $currentRow['SaturdayClose'],

                'description' => trim($currentRow['LongDesc']),

                'services' => $productsServices['services'],
                'products' => $productsServices['products'],


                'venue_types' => ['_ids' => [1]],  // default to store

                'city_id' => $this->request->getQuery('cityId')


            ];
           // debug($data);

           $result = $this->geocodeAddress( $data['address'], $redirect = false );

            $data = array_merge_recursive( $data, $result );

            $data['slug'] = "{$data['slug']}-{$data['citySlug']}"; // add the city name the venue slug

            $data['checkcode'] = substr( trim(preg_replace( '/[^0-9]/', '', $data['phone']  ) ), -10 );


            // echo json_encode( $data );


            return( $data);





        }

    public function saveJsonFile()
    {

        //$this->autoRender = false;

        // open the json file up
        $jsonFile = $this->request->getQuery('filename');

        if ( $jsonFile) {
            $file = new File( WWW_ROOT . 'csv_files' . DS . $jsonFile . '.json'); // add json extension to file to load
            $contents = $file->read();
            $file->close(); //debug($contents);

            $data = json_decode($contents, true);

            if ( is_array($data)) {
               // debug($data);

               // $data = [ reset($data) ]; // TEMP JUST FIRST ROW



                foreach ($data as $i => $row) { // debug($row['checkcode']);
                    // check if venue has entry in check table
                    $venueId = $this->getCheckTable($row['checkcode']); //debug($venueId);

                    if ($venueId) {
                        $venueId = $this->saveJsonData( $row, $venueId );
                    } else {
                        $venueId = $this->saveJsonData( $row);

                    }
                    if ($venueId) {
                        $this->setCheckTable($row['checkcode'], $venueId);
                    } else {
                        debug("VenueID not set");
                    }


                    // if so, get the venueId and we'll update that same entry
                    //$venueId =

                    // else add new entry for this one.
                    //$this->setCheckTable($row['checkcode'], '101');

                    //exit;
                }
            }
            else {
                debug('File not json');
            }


        }

    }


    /*
     * Lookup the check code, if found, return the associated venueId
     */
    private function getCheckTable($checkCode = 0) {
        $this->loadModel('VenueChecks');

        $query = $this->VenueChecks->find('all')
            ->where(['check_number' => $checkCode])
            ->limit(1);

        $row = $query->first();

        //debug( $row);

        if ( $row) {
            $data = json_decode( $row['update_json'] );

            $venueId = intval($data->venueId); //debug($venueId);

            return $venueId;

        } else {
            return false;
        }

    }

    /*
     * Lookup the checkcode, add the venueId if not set.
     */
    private function setCheckTable($checkCode, $venueId ){ //debug( [$checkCode, $venueId]);

        if (!$checkCode) {
            debug('setCheckTable: NO CHECK-CODE SUPPLIED');
            return false;
        }

        $this->loadModel('VenueChecks');

        $query = $this->VenueChecks->find('all')
            ->where(['check_number' => $checkCode])
            ->limit(1);

        $venueCheck = $query->first();

        if ($venueCheck) {
            $data = json_decode( $venueCheck['update_json'] );

            $data->venueId = intval($venueId); // debug($venueId);

            $venueCheck->update_json = json_encode($data);

            $this->VenueChecks->save($venueCheck);
        } else {

            $venueCheck = $this->VenueChecks->newEntity();

            $venueCheck->check_number = $checkCode;

            $data = json_decode( $venueCheck['update_json'] );

            if ( $data == false ) { $data = (object)[]; }

            $data->venueId = intval($venueId); // debug($venueId);

            $venueCheck->update_json = json_encode($data);

            $this->VenueChecks->save($venueCheck);

        }

    }

    private function saveJsonData( $data, $venueId = null ) {

        $this->loadModel('Venues');

        if (!$venueId) {
            $venue = $this->Venues->newEntity(); debug('create new');
        } else{
            $venue = $this->Venues->findById($venueId)->first(); debug( "load $venueId");

            if ( !$venue ) {
                $venue = $this->Venues->newEntity(); debug('not found, create new');
            }
        }

        $venue->name = $data['name'];
        $venue->slug = $data['slug'];
        $venue->address = $data['address'];

        $venue->description = $data['description'];

        $venue->city_id = $data['cityId'];

        if ( $data['cityRegionId'] > 0 ) $venue->city_region_id = $data['cityRegionId'];

        if ( isset($data['chain_id']) ) $venue->chain_id = $data['chain_id'];
        $venue->province_id = $data['provinceId'];
        $venue->country_id = $data['countryId'];

        $venue->geo_latt = $data['geoLatt'];
        $venue->geo_long = $data['geoLong'];

        $venue->hours_sun = $data['hours_sun'];
        $venue->hours_mon = $data['hours_mon'];
        $venue->hours_tue = $data['hours_tue'];
        $venue->hours_wed = $data['hours_wed'];
        $venue->hours_thu = $data['hours_thu'];
        $venue->hours_fri = $data['hours_fri'];
        $venue->hours_sat = $data['hours_sat'];

        $venue->phone = json_encode( ['phone' => $data['phone'] ]);
        $venue->website = json_encode( ['website' => $data['website'] ]);

        // patch in associated data

        $data = [
            'venue_types' => $data['venue_types'],
            'services' => $data['services'],
            'products' => $data['products']
        ];

        $venue = $this->Venues->patchEntity($venue, $data, ['validate' => false ]);

        //debug($venue);


        $result = $this->Venues->save($venue);



        if ( !$result) {
            debug($venue); exit;
        }

        $venueId =  $result->id;

        return $venueId;

        /*
         * [
	'name' => 'Cellular Magician',
	...
	'services' => [
		'_ids' => [
			(int) 0 => '11',
			(int) 1 => '6'
		]
	],
	...
    */

    }
}
