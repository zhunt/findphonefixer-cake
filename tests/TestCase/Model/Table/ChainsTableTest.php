<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChainsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChainsTable Test Case
 */
class ChainsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChainsTable
     */
    public $Chains;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chains',
        'app.venues',
        'app.cities',
        'app.provinces',
        'app.countries',
        'app.city_regions',
        'app.malls',
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
        $config = TableRegistry::exists('Chains') ? [] : ['className' => ChainsTable::class];
        $this->Chains = TableRegistry::get('Chains', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chains);

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
