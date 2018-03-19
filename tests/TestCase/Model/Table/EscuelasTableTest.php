<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EscuelasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EscuelasTable Test Case
 */
class EscuelasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EscuelasTable
     */
    public $Escuelas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.escuelas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Escuelas') ? [] : ['className' => EscuelasTable::class];
        $this->Escuelas = TableRegistry::get('Escuelas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Escuelas);

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
