<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntregasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntregasTable Test Case
 */
class EntregasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EntregasTable
     */
    public $Entregas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entregas',
        'app.modalidad_pagos',
        'app.alumnos_eventos',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Entregas') ? [] : ['className' => EntregasTable::class];
        $this->Entregas = TableRegistry::get('Entregas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Entregas);

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
