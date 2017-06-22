<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LatestVenues cell
 */
class LatestVenuesCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    public $helpers = ['PhoneNumber'];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display( $cityId = null)
    {

        $this->loadModel('Venues');

        $showCityName = false;

        $venues = $this->Venues->find('homepageVenues')->order('Venues.created')->limit(4);

        if ( !empty($cityId) ) {
            $venues->where([ 'Venues.city_id' => $cityId ]);
            $showCityName = true;
        }

        // debug($venues->toArray() );

        $this->set('venues', $venues);
        $this->set('showCityName', $showCityName);
    }
}
