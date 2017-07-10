<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VenueTypesVenuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VenueTypesVenuesTable Test Case
 */
class VenueTypesVenuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VenueTypesVenuesTable
     */
    public $VenueTypesVenues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.venue_types_venues',
        'app.venues',
        'app.cities',
        'app.provinces',
        'app.countries',
        'app.city_regions',
        'app.malls',
        'app.chains',
        'app.amenities',
        'app.amenities_venues',
        'app.brands',
        'app.brands_venues',
        'app.cuisines',
        'app.cuisines_venues',
        'app.languages',
        'app.languages_venues',
        'app.products',
        'app.products_venues',
        'app.services',
        'app.services_venues',
        'app.venue_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VenueTypesVenues') ? [] : ['className' => VenueTypesVenuesTable::class];
        $this->VenueTypesVenues = TableRegistry::get('VenueTypesVenues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VenueTypesVenues);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
