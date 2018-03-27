<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlumnosEventosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlumnosEventosTable Test Case
 */
class AlumnosEventosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AlumnosEventosTable
     */
    public $AlumnosEventos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.alumnos_eventos',
        'app.alumnos',
        'app.eventos',
        'app.models',
        'app.tipo_eventos',
        'app.alumnos_invitados',
        'app.mesas',
        'app.personas_tipo_menus',
        'app.modalidades',
        'app.entregas',
        'app.modalidad_pagos',
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
        $config = TableRegistry::exists('AlumnosEventos') ? [] : ['className' => AlumnosEventosTable::class];
        $this->AlumnosEventos = TableRegistry::get('AlumnosEventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AlumnosEventos);

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
