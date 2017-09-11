<?php
namespace App\Test\TestCase\Form;

use App\Form\ReportErrorForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\ReportErrorForm Test Case
 */
class ReportErrorFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\ReportErrorForm
     */
    public $ReportError;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ReportError = new ReportErrorForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReportError);

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
