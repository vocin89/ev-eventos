<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entregas Model
 *
 * @property \App\Model\Table\ModalidadPagosTable|\Cake\ORM\Association\BelongsTo $ModalidadPagos
 * @property \App\Model\Table\AlumnosEventosTable|\Cake\ORM\Association\BelongsTo $AlumnosEventos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Entrega get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entrega newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Entrega[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entrega|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entrega patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entrega[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entrega findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntregasTable extends Table
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

        $this->setTable('entregas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ModalidadPagos', [
            'foreignKey' => 'modalidad_pago_id'
        ]);
        $this->belongsTo('AlumnosEventos', [
            'foreignKey' => 'alumnos_evento_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    // public function validationDefault(Validator $validator)
    // {
    //     $validator
    //         ->integer('id')
    //         ->allowEmpty('id', 'create');

    //     $validator
    //         ->numeric('monto')
    //         ->allowEmpty('monto');

    //     $validator
    //         ->dateTime('fecha')
    //         ->allowEmpty('fecha');

    //     $validator
    //         ->scalar('concepto')
    //         ->maxLength('concepto', 100)
    //         ->allowEmpty('concepto');

    //     $validator
    //         ->allowEmpty('eliminado');

    //     return $validator;
    // }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['modalidad_pago_id'], 'ModalidadPagos'));
    //     $rules->add($rules->existsIn(['alumnos_evento_id'], 'AlumnosEventos'));
    //     $rules->add($rules->existsIn(['user_id'], 'Users'));

    //     return $rules;
    // }
}
