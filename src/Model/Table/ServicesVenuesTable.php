<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServicesVenues Model
 *
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsTo $Venues
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\ServicesVenue get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServicesVenue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServicesVenue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServicesVenue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServicesVenue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServicesVenue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServicesVenue findOrCreate($search, callable $callback = null, $options = [])
 */
class ServicesVenuesTable extends Table
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

        $this->setTable('services_venues');
        $this->setDisplayField('venue_id');
        $this->setPrimaryKey(['venue_id', 'service_id']);

        $this->belongsTo('Venues', [
            'foreignKey' => 'venue_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['venue_id'], 'Venues'));
        $rules->add($rules->existsIn(['service_id'], 'Services'));

        return $rules;
    }
}
