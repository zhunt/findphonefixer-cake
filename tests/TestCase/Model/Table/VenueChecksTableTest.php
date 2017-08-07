<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VenueChecksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VenueChecksTable Test Case
 */
class VenueChecksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VenueChecksTable
     */
    public $VenueChecks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.venue_checks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VenueChecks') ? [] : ['className' => VenueChecksTable::class];
        $this->VenueChecks = TableRegistry::get('VenueChecks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VenueChecks);

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
}
