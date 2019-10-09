<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StuffsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StuffsTable Test Case
 */
class StuffsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StuffsTable
     */
    public $Stuffs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Stuffs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Stuffs') ? [] : ['className' => StuffsTable::class];
        $this->Stuffs = TableRegistry::getTableLocator()->get('Stuffs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stuffs);

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
