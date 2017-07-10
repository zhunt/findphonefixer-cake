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

        $this->loadModel('Venues');


        // get all the venues in a city
        $venueIds = $this->Venues->find('list')
            ->select('Venues.id')
            ->where(['Venues.flag_published' => true, 'Venues.city_id' => $cityId])->toArray();

        if ( is_array($venueIds)) {
            $venueIds = array_keys($venueIds);
        }

        // now get the service-id that these venues have

        $this->loadModel('ServicesVenues');

        $serviceIds = $this->ServicesVenues->find('list', ['keyField' => 'service_id','valueField' => 'service_id'] )
            ->where(['ServicesVenues.venue_id' => $venueIds], ['ServicesVenues.venue_id' => 'integer[]' ] )
            ->select('ServicesVenues.service_id')
            ->group('service_id')
            ->toArray();

        // now get the product-id that these venues have

        $this->loadModel('ProductsVenues');

        $productIds = $this->ProductsVenues->find('list', ['keyField' => 'product_id','valueField' => 'product_id'] )
            ->where(['ProductsVenues.venue_id' => $venueIds], ['ProductsVenues.venue_id' => 'integer[]' ] )
            ->select('ProductsVenues.product_id')
            ->group('product_id')
            ->toArray();

        // add more for cuisines, etc.


        $cityServices = $this->Venues->Services->find('list', ['keyField' => 'slug','valueField' => 'name'] )->order('name')->where([ 'Services.id' => $serviceIds ], ['Services.id' => 'integer[]' ] );
        $cityProducts = $this->Venues->Products->find('list', ['keyField' => 'slug','valueField' => 'name'] )->order('name')->where([ 'Products.id' => $productIds ], ['Products.id' => 'integer[]' ] );
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
