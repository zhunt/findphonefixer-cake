<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CityRegionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CityRegionsTable Test Case
 */
class CityRegionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CityRegionsTable
     */
    public $CityRegions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.city_regions',
        'app.cities',
        'app.provinces',
        'app.countries',
        'app.venues',
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
        $config = TableRegistry::exists('CityRegions') ? [] : ['className' => CityRegionsTable::class];
        $this->CityRegions = TableRegistry::get('CityRegions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CityRegions);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
