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

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {

        $this->loadModel('Venues');

        $venues = $this->Venues->find('homepageVenues')->order('Venues.created')->limit(4);

        $this->set('venues', $venues);
    }
}
