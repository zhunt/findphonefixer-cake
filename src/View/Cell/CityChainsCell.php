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

    public function display( $cityId = null, $cityName = null)
    {
        // TODO: make list based on venue's chains
        $this->loadModel('Chains');

        $cityChains = $this->Chains->find('list', ['keyField' => 'slug','valueField' => 'name'] )->order('name');

        $chains =  $cityChains->toArray();

        $this->set('chains', $chains);
        $this->set('cityName', $cityName);


    }
}


