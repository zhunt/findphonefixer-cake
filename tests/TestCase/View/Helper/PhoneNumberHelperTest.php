<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\PhoneNumberHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\PhoneNumberHelper Test Case
 */
class PhoneNumberHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\PhoneNumberHelper
     */
    public $PhoneNumber;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->PhoneNumber = new PhoneNumberHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhoneNumber);

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
