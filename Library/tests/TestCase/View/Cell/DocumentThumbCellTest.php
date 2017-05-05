<?php
namespace Library\Test\TestCase\View\Cell;

use Cake\TestSuite\TestCase;
use Library\View\Cell\DocumentThumbCell;

/**
 * Library\View\Cell\DocumentThumbCell Test Case
 */
class DocumentThumbCellTest extends TestCase
{

    /**
     * Request mock
     *
     * @var \Cake\Network\Request|\PHPUnit_Framework_MockObject_MockObject
     */
    public $request;

    /**
     * Response mock
     *
     * @var \Cake\Network\Response|\PHPUnit_Framework_MockObject_MockObject
     */
    public $response;

    /**
     * Test subject
     *
     * @var \Library\View\Cell\DocumentThumbCell
     */
    public $DocumentThumb;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Network\Request')->getMock();
        $this->response = $this->getMockBuilder('Cake\Network\Response')->getMock();
        $this->DocumentThumb = new DocumentThumbCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentThumb);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
