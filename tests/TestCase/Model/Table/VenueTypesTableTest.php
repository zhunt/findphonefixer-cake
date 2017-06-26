<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VenueTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VenueTypesTable Test Case
 */
class VenueTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VenueTypesTable
     */
    public $VenueTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.venue_types',
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
        $config = TableRegistry::exists('VenueTypes') ? [] : ['className' => VenueTypesTable::class];
        $this->VenueTypes = TableRegistry::get('VenueTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VenueTypes);

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
