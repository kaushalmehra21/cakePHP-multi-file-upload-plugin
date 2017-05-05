<?php
namespace Library\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Library\Model\Table\LibrarySettingsTable;

/**
 * Library\Model\Table\LibrarySettingsTable Test Case
 */
class LibrarySettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Library\Model\Table\LibrarySettingsTable
     */
    public $LibrarySettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.library.library_settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LibrarySettings') ? [] : ['className' => 'Library\Model\Table\LibrarySettingsTable'];
        $this->LibrarySettings = TableRegistry::get('LibrarySettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LibrarySettings);

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
