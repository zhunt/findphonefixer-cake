<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\VenueHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\VenueHelper Test Case
 */
class VenueHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\VenueHelper
     */
    public $Venue;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Venue = new VenueHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Venue);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
