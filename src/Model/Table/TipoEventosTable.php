<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoEventos Model
 *
 * @property \App\Model\Table\ModelsTable|\Cake\ORM\Association\BelongsTo $Models
 * @property \App\Model\Table\EventosTable|\Cake\ORM\Association\HasMany $Eventos
 *
 * @method \App\Model\Entity\TipoEvento get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoEvento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoEvento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoEvento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoEvento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoEvento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoEvento findOrCreate($search, callable $callback = null, $options = [])
 */
class TipoEventosTable extends Table
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

        $this->setTable('tipo_eventos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Models', [
            'foreignKey' => 'model_id'
        ]);
        $this->hasMany('Eventos', [
            'foreignKey' => 'tipo_evento_id'
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
            ->maxLength('nombre', 30)
            ->allowEmpty('nombre');

        $validator
            ->scalar('model')
            ->maxLength('model', 20)
            ->allowEmpty('model');

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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['model_id'], 'Models'));

        return $rules;
    }
}
