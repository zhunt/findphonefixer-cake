<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsVenuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsVenuesTable Test Case
 */
class ProductsVenuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsVenuesTable
     */
    public $ProductsVenues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.products_venues',
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
        'app.services',
        'app.services_venues',
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
        $config = TableRegistry::exists('ProductsVenues') ? [] : ['className' => ProductsVenuesTable::class];
        $this->ProductsVenues = TableRegistry::get('ProductsVenues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsVenues);

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
