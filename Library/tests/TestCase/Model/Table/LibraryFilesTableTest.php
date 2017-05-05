<?php
namespace Library\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Library\Model\Table\LibraryFilesTable;

/**
 * Library\Model\Table\LibraryFilesTable Test Case
 */
class LibraryFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Library\Model\Table\LibraryFilesTable
     */
    public $LibraryFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.library.library_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LibraryFiles') ? [] : ['className' => 'Library\Model\Table\LibraryFilesTable'];
        $this->LibraryFiles = TableRegistry::get('LibraryFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LibraryFiles);

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
