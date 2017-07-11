<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemPromotionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemPromotionsTable Test Case
 */
class ItemPromotionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemPromotionsTable
     */
    public $ItemPromotions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItemPromotions') ? [] : ['className' => 'App\Model\Table\ItemPromotionsTable'];
        $this->ItemPromotions = TableRegistry::get('ItemPromotions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemPromotions);

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
