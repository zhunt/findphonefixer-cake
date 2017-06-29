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
    public function display( $cityId = null, $cityName = null, $citySlug = null)
    {
        // TODO: make list based on venue's services/products

        $this->loadModel('Services');
        $this->loadModel('Products');

        $cityServices = $this->Services->find('list', ['keyField' => 'slug','valueField' => 'name'] )->order('name');
        $cityProducts = $this->Products->find('list', ['keyField' => 'slug','valueField' => 'name'] )->order('name');
        //$cityProducts->unionAll($cityServices);

        //$productsServicesList =  $cityProducts->toArray();

        //asort($productsServicesList);

        //$this->set('productsServicesList', $productsServicesList);
        $this->set('cityServices', $cityServices);
        $this->set('cityProducts', $cityProducts);
        $this->set('cityName', $cityName);
        $this->set('citySlug', $citySlug);


    }
}
