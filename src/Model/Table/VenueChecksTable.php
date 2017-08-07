<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VenueChecks Model
 *
 * @method \App\Model\Entity\VenueCheck get($primaryKey, $options = [])
 * @method \App\Model\Entity\VenueCheck newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VenueCheck[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VenueCheck|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueCheck patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VenueCheck[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VenueCheck findOrCreate($search, callable $callback = null, $options = [])
 */
class VenueChecksTable extends Table
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

        $this->setTable('venue_checks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->requirePresence('check_number', 'create')
            ->notEmpty('check_number');

        $validator
            ->requirePresence('update_json', 'create')
            ->notEmpty('update_json');

        return $validator;
    }
}
