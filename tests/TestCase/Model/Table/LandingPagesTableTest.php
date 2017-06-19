<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LandingPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LandingPagesTable Test Case
 */
class LandingPagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LandingPagesTable
     */
    public $LandingPages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.landing_pages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LandingPages') ? [] : ['className' => LandingPagesTable::class];
        $this->LandingPages = TableRegistry::get('LandingPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LandingPages);

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
