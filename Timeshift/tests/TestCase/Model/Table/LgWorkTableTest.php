<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LgWorkTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LgWorkTable Test Case
 */
class LgWorkTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LgWorkTable
     */
    public $LgWork;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LgWork',
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
        $config = TableRegistry::getTableLocator()->exists('LgWork') ? [] : ['className' => LgWorkTable::class];
        $this->LgWork = TableRegistry::getTableLocator()->get('LgWork', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LgWork);

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
