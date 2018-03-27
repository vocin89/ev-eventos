<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @property \App\Model\Table\ModelsTable|\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\TipoEventosTable|\Cake\ORM\Association\BelongsTo $TipoEventos
 * @property \App\Model\Table\AlumnosInvitadosTable|\Cake\ORM\Association\HasMany $AlumnosInvitados
 * @property \App\Model\Table\MesasTable|\Cake\ORM\Association\HasMany $Mesas
 * @property \App\Model\Table\PersonasTipoMenusTable|\Cake\ORM\Association\HasMany $PersonasTipoMenus
 *
 * @method \App\Model\Entity\Evento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventosTable extends Table
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

        $this->setTable('eventos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Escuelas', [
            'foreignKey' => 'model_id'
        ]);
        
        $this->belongsTo('TipoEventos', [
            'foreignKey' => 'tipo_evento_id'
        ]);
        $this->hasMany('AlumnosInvitados', [
            'foreignKey' => 'evento_id'
        ]);

        $this->hasMany('AlumnosEventos', [
            'foreignKey' => 'evento_id'
        ]);

        $this->hasMany('Mesas', [
            'foreignKey' => 'evento_id'
        ]);
        $this->hasMany('PersonasTipoMenus', [
            'foreignKey' => 'evento_id'
        ]);
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
            ->maxLength('nombre', 50)
            ->allowEmpty('nombre');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        $validator
            ->time('horario')
            ->allowEmpty('horario');

        $validator
            ->numeric('precio')
            ->allowEmpty('precio');

        $validator
            ->allowEmpty('activo');

        $validator
            ->allowEmpty('eliminado');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['model_id'], 'Models'));
    //     $rules->add($rules->existsIn(['tipo_evento_id'], 'TipoEventos'));

    //     return $rules;
    // }
}
