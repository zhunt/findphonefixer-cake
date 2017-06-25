<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * NearbyVenues cell
 */
class NearbyVenuesCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($venueId = null, $geoLatt = null, $geoLong = null)
    {
        $this->loadModel('Venues');

        //debug($venueId, $geoLatt, $geoLong );
        //debug($geoLong );

        $result =$this->Venues->find('nearbyVenues', [ 'venueId' => $venueId, 'geoLatt' => $geoLatt, 'geoLong' => $geoLong ] )
            ->contain(['VenueTypes']);

        $this->set('venues', $result);
    }
}
