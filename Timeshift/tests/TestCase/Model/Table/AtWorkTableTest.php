<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtWorkTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtWorkTable Test Case
 */
class AtWorkTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AtWorkTable
     */
    public $AtWork;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AtWork',
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
        $config = TableRegistry::getTableLocator()->exists('AtWork') ? [] : ['className' => AtWorkTable::class];
        $this->AtWork = TableRegistry::getTableLocator()->get('AtWork', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AtWork);

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
