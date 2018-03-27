<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Escuelas Model
 *
 * @method \App\Model\Entity\Escuela get($primaryKey, $options = [])
 * @method \App\Model\Entity\Escuela newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Escuela[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Escuela|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Escuela patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Escuela[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Escuela findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EscuelasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('escuelas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Escuelas', [
            'className'=>'Eventos',
            'foreignKey' => 'model_id'
        ]);

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 30)
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('eliminado');

        return $validator;
    }
}
