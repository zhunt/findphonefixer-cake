<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicesVenuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicesVenuesTable Test Case
 */
class ServicesVenuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicesVenuesTable
     */
    public $ServicesVenues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.services_venues',
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
        'app.venue_types',
        'app.venue_types_venues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ServicesVenues') ? [] : ['className' => ServicesVenuesTable::class];
        $this->ServicesVenues = TableRegistry::get('ServicesVenues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ServicesVenues);

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
