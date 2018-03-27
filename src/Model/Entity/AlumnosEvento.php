<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AlumnosEvento Entity
 *
 * @property int $id
 * @property int $alumno_id
 * @property int $evento_id
 * @property int $modalidade_id
 * @property string $observaciones
 * @property int $cantidad_nino
 * @property int $cantidad_adulto
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $eliminado
 *
 * @property \App\Model\Entity\Alumno $alumno
 * @property \App\Model\Entity\Evento $evento
 * @property \App\Model\Entity\Modalidade $modalidade
 * @property \App\Model\Entity\Entrega[] $entregas
 */
class AlumnosEvento extends Entity
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
    //     'alumno_id' => true,
    //     'alumno_id' => true,
        
    //     'evento_id' => true,
    //     'modalidade_id' => true,
    //     'observaciones' => true,
    //     'cantidad_nino' => true,
    //     'cantidad_adulto' => true,
    //     'created' => true,
    //     'modified' => true,
    //     'eliminado' => true,
    //     'alumno' => true,
    //     'evento' => true,
    //     'modalidade' => true,
    //     'entregas' => true
    // ];
}
