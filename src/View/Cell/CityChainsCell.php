<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CityChains cell
 */
class CityChainsCell extends Cell
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

    public function display( $cityId = null, $cityName = null, $citySlug = null)
    {
        // TODO: make list based on venue's chains

        $this->loadModel('Venues');

        // get all the venues in a city
        $venueIds = $this->Venues->find('list', ['keyField' => 'chain_id','valueField' => 'chain_id'])
            ->select('Venues.chain_id')
            ->where(['Venues.flag_published' => true, 'Venues.city_id' => $cityId])->toArray();

        if ( is_array($venueIds)) {
            $venueIds = array_keys($venueIds);
        }

        $chainsIds = $this->Venues->find('list', ['keyField' => 'chain_id','valueField' => 'chain_id'] )
            ->where(['Venues.chain_id' => $venueIds], ['Venues.chain_id' => 'integer[]' ] )
            ->select('Venues.chain_id')
            ->group('chain_id')
            ->toArray();


        if (!empty($chainsIds) ) {
            $cityChains = $this->Venues->Chains->find('list', ['keyField' => 'slug','valueField' => 'name'] )->order('name')->where([ 'Chains.id' => $chainsIds ], ['Chains.id' => 'integer[]' ] );
            $chains =  $cityChains->toArray();
        } else {
            $chains = [];
        }



        $this->set('chains', $chains);
        $this->set('cityName', $cityName);
        $this->set('citySlug', $citySlug);


    }
}


