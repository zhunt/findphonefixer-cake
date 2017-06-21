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
    public function display()
    {

        $this->loadModel('Venues');

        $venues = $this->Venues->find('homepageVenues')->order('Venues.created')->limit(8);

        $this->set('venues', $venues);
    }
}
