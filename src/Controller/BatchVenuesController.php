<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Utility\Inflector;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

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
        $this->Auth->allow( ['index', 'add', 'loadCsvFile', 'load-csv-file', ]); // make these pages public

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
            if ($this->Venues->save($venue)) {
                $this->Flash->success(__('The venue has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect(['action' => 'add',
                        'file_offset' => intval($this->request->getQuery('file_offset') )+ 1 ,
                        'filename' => $this->request->getQuery('csv_file.name') ] );
            }
            $this->Flash->error(__('The batch venue could not be saved. Please, try again.'));
        }


        // load in the CSV file with offset
        $currentRow = '';
        if ( $this->request->getQuery('filename') ) {

            $currentRow = $this->getCurrentCsvRow();

            $venue = $this->populateVenueTable($venue, $currentRow);

            debug($venue);

        }

        debug($currentRow);



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
            'hours_thr' => $currentRow['Thursday'] . ' - ' . $currentRow['ThursdayClose'],
            'hours_fri' => $currentRow['Friday'] . ' - ' . $currentRow['FridayClose'],
            'hours_sat' => $currentRow['Saturday'] . ' - ' . $currentRow['SaturdayClose'],

            'description' => trim( $currentRow['LongDesc'] ),

            'venue_types' => [ '_ids' => [ 1 ] ] // default to store




        ];

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
