<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkingTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkingTable Test Case
 */
class WorkingTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkingTable
     */
    public $Working;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Working',
        'app.Members',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Working') ? [] : ['className' => WorkingTable::class];
        $this->Working = TableRegistry::getTableLocator()->get('Working', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Working);

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
