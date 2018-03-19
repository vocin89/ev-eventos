<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TipoEvento Entity
 *
 * @property int $id
 * @property string $nombre
 * @property int $model_id
 * @property int $eliminado
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\Evento[] $eventos
 */
class TipoEvento extends Entity
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
        'model' => true,
        'model_id' => true,
        'eliminado' => true,
        'eventos' => true
    ];
}
