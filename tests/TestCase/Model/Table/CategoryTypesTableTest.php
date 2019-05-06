<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoryTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoryTypesTable Test Case
 */
class CategoryTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoryTypesTable
     */
    public $CategoryTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CategoryTypes',
        'app.Categories',
        'app.MealTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CategoryTypes') ? [] : ['className' => CategoryTypesTable::class];
        $this->CategoryTypes = TableRegistry::getTableLocator()->get('CategoryTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoryTypes);

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
