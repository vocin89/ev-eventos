<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id
 * @property string $nombre
 * @property int $model_id
 * @property int $tipo_evento_id
 * @property \Cake\I18n\FrozenDate $fecha
 * @property \Cake\I18n\FrozenTime $horario
 * @property float $precio
 * @property int $activo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $eliminado
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\TipoEvento $tipo_evento
 * @property \App\Model\Entity\AlumnosInvitado[] $alumnos_invitados
 * @property \App\Model\Entity\Mesa[] $mesas
 * @property \App\Model\Entity\PersonasTipoMenu[] $personas_tipo_menus
 */
class Evento extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'model_id' => true,
        'tipo_evento_id' => true,
        'fecha' => true,
        'horario' => true,
        'precio' => true,
        'activo' => true,
        'created' => true,
        'modified' => true,
        'eliminado' => true,
        'model' => true,
        'tipo_evento' => true,
        'alumnos_invitados' => true,
        'mesas' => true,
        'personas_tipo_menus' => true
    ];
}
