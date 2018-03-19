<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoEventosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoEventosTable Test Case
 */
class TipoEventosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoEventosTable
     */
    public $TipoEventos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_eventos',
        'app.models',
        'app.eventos',
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
        $config = TableRegistry::exists('TipoEventos') ? [] : ['className' => TipoEventosTable::class];
        $this->TipoEventos = TableRegistry::get('TipoEventos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoEventos);

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
