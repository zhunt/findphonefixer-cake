<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CityRegions Model
 *
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\HasMany $Venues
 *
 * @method \App\Model\Entity\CityRegion get($primaryKey, $options = [])
 * @method \App\Model\Entity\CityRegion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CityRegion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CityRegion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CityRegion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CityRegion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CityRegion findOrCreate($search, callable $callback = null, $options = [])
 */
class CityRegionsTable extends Table
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

        $this->setTable('city_regions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Muffin/Slug.Slug');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Venues', [
            'foreignKey' => 'city_region_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('display_name');

        $validator
            ->allowEmpty('slug');

        $validator
            ->allowEmpty('seo_title');

        $validator
            ->allowEmpty('seo_desc');

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
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }
}
