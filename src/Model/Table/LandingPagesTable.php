<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LandingPages Model
 *
 * @method \App\Model\Entity\LandingPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\LandingPage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LandingPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LandingPage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LandingPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LandingPage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LandingPage findOrCreate($search, callable $callback = null, $options = [])
 */
class LandingPagesTable extends Table
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

        $this->setTable('landing_pages');
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
            ->requirePresence('path', 'create')
            ->notEmpty('path');

        $validator
            ->allowEmpty('seo_title');

        $validator
            ->allowEmpty('seo_desc');

        return $validator;
    }
}
