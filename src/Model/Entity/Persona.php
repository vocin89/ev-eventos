<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $mail
 * @property string $telefono
 * @property int $tipo_persona_id
 * @property int $eliminado
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\TipoPersona $tipo_persona
 * @property \App\Model\Entity\AlumnosInvitado[] $alumnos_invitados
 * @property \App\Model\Entity\Observacione[] $observaciones
 * @property \App\Model\Entity\PersonasTipoMenu[] $personas_tipo_menus
 */
class Persona extends Entity
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
    // protected $_accessible = [
    //     'nombre' => true,
    //     'apellido' => true,
    //     'mail' => true,
    //     'telefono' => true,
    //     'tipo_persona_id' => true,
    //     'eliminado' => true,
    //     'created' => true,
    //     'modified' => true,
    //     'tipo_persona' => true,
    //     'alumnos_invitados' => true,
    //     'observaciones' => true,
    //     'personas_tipo_menus' => true
    // ];
}
