<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personas Model
 *
 * @property \App\Model\Table\TipoPersonasTable|\Cake\ORM\Association\BelongsTo $TipoPersonas
 * @property \App\Model\Table\AlumnosInvitadosTable|\Cake\ORM\Association\HasMany $AlumnosInvitados
 * @property \App\Model\Table\ObservacionesTable|\Cake\ORM\Association\HasMany $Observaciones
 * @property \App\Model\Table\PersonasTipoMenusTable|\Cake\ORM\Association\HasMany $PersonasTipoMenus
 *
 * @method \App\Model\Entity\Persona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Persona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persona findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonasTable extends Table
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

        $this->setTable('personas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TipoPersonas', [
            'foreignKey' => 'tipo_persona_id'
        ]);
        
        $this->hasMany('AlumnosInvitados', [
            'foreignKey' => 'alumno_id'
        ]);

        $this->hasMany('AlumnosInvitados', [
            'foreignKey' => 'tutor_id'
        ]);


        $this->hasMany('Observaciones', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('PersonasTipoMenus', [
            'foreignKey' => 'persona_id'
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
    //         ->scalar('nombre')
    //         ->maxLength('nombre', 50)
    //         ->allowEmpty('nombre');

    //     $validator
    //         ->scalar('apellido')
    //         ->maxLength('apellido', 50)
    //         ->allowEmpty('apellido');

    //     $validator
    //         ->scalar('mail')
    //         ->maxLength('mail', 20)
    //         ->allowEmpty('mail');

    //     $validator
    //         ->scalar('telefono')
    //         ->maxLength('telefono', 20)
    //         ->allowEmpty('telefono');

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
    //     $rules->add($rules->existsIn(['tipo_persona_id'], 'TipoPersonas'));

    //     return $rules;
    // }
}
