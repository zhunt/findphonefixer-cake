<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CitiesList cell
 */
class CitiesListCell extends Cell
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
    public function display()
    {
        $this->loadModel('Cities');
        $cities = $this->Cities->find('homepageCities')->order('Cities.name');//->toArray();

        $this->set('cities', $cities);
    }
}
