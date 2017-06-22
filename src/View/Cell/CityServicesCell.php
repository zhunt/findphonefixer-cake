<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CityServices cell
 */
class CityServicesCell extends Cell
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
        $this->loadModel('Services');
        $this->loadModel('Products');

        $cityServices = $this->Services->find('list', ['keyField' => 'slug','valueField' => 'name'] );
        $cityProducts = $this->Products->find('list', ['keyField' => 'slug','valueField' => 'name'] );
        $cityProducts->unionAll($cityServices);

        $prductsServicesList =  $cityProducts->toArray();

        asort($prductsServicesList);

        $this->set('prductsServicesList', $prductsServicesList);
        $this->set('cityName', $cityName);


    }
}
