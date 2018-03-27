<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entrega Entity
 *
 * @property int $id
 * @property float $monto
 * @property int $modalidad_pago_id
 * @property int $alumnos_evento_id
 * @property \Cake\I18n\FrozenTime $fecha
 * @property string $concepto
 * @property int $user_id
 * @property int $eliminado
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ModalidadPago $modalidad_pago
 * @property \App\Model\Entity\AlumnosEvento $alumnos_evento
 * @property \App\Model\Entity\User $user
 */
class Entrega extends Entity
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
        'monto' => true,
        'modalidad_pago_id' => true,
        'alumnos_evento_id' => true,
        'fecha' => true,
        'concepto' => true,
        'user_id' => true,
        'eliminado' => true,
        'created' => true,
        'modified' => true,
        'modalidad_pago' => true,
        'alumnos_evento' => true,
        'user' => true
    ];
}
