<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventosTable Test Case
 */
class EventosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventosTable
     */
    public $Eventos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.eventos',
        'app.models',
        'app.tipo_eventos',
        'app.alumnos_invitados',
        'app.mesas',
        'app.personas_tipo_menus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Eventos') ? [] : ['className' => EventosTable::class];
        $this->Eventos = TableRegistry::get('Eventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Eventos);

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
