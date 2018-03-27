<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AlumnosEventos Model
 *
 * @property \App\Model\Table\AlumnosTable|\Cake\ORM\Association\BelongsTo $Alumnos
 * @property \App\Model\Table\EventosTable|\Cake\ORM\Association\BelongsTo $Eventos
 * @property \App\Model\Table\ModalidadesTable|\Cake\ORM\Association\BelongsTo $Modalidades
 * @property \App\Model\Table\EntregasTable|\Cake\ORM\Association\HasMany $Entregas
 *
 * @method \App\Model\Entity\AlumnosEvento get($primaryKey, $options = [])
 * @method \App\Model\Entity\AlumnosEvento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AlumnosEvento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlumnosEvento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlumnosEvento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AlumnosEvento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlumnosEvento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlumnosEventosTable extends Table
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

        $this->setTable('alumnos_eventos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Alumno', [
            'className'=>'Personas',
            'foreignKey' => 'alumno_id'
        ]);

        $this->belongsTo('Tutore', [
            'className'=>'Personas',
            'foreignKey' => 'tutor_id'
        ]);

        $this->belongsTo('Eventos', [
            'foreignKey' => 'evento_id'
        ]);
        $this->belongsTo('Modalidades', [
            'foreignKey' => 'modalidade_id'
        ]);
        $this->hasMany('Entregas', [
            'foreignKey' => 'alumnos_evento_id'
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
    //         ->scalar('observaciones')
    //         ->allowEmpty('observaciones');

    //     $validator
    //         ->integer('cantidad_nino')
    //         ->allowEmpty('cantidad_nino');

    //     $validator
    //         ->integer('cantidad_adulto')
    //         ->allowEmpty('cantidad_adulto');

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
    //     $rules->add($rules->existsIn(['alumno_id'], 'Alumnos'));
    //     $rules->add($rules->existsIn(['evento_id'], 'Eventos'));
    //     $rules->add($rules->existsIn(['modalidade_id'], 'Modalidades'));

    //     return $rules;
    // }
}
