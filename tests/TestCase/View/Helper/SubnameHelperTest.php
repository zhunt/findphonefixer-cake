<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\SubnameHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\SubnameHelper Test Case
 */
class SubnameHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\SubnameHelper
     */
    public $Subname;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Subname = new SubnameHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subname);

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
