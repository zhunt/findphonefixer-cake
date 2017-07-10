<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VenueTypesVenues Model
 *
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsTo $Venues
 * @property \App\Model\Table\VenueTypesTable|\Cake\ORM\Association\BelongsTo $VenueTypes
 *
 * @method \App\Model\Entity\VenueTypesVenue get($primaryKey, $options = [])
 * @method \App\Model\Entity\VenueTypesVenue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VenueTypesVenue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VenueTypesVenue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VenueTypesVenue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VenueTypesVenue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VenueTypesVenue findOrCreate($search, callable $callback = null, $options = [])
 */
class VenueTypesVenuesTable extends Table
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

        $this->setTable('venue_types_venues');
        $this->setDisplayField('venue_id');
        $this->setPrimaryKey(['venue_id', 'venue_type_id']);

        $this->belongsTo('Venues', [
            'foreignKey' => 'venue_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('VenueTypes', [
            'foreignKey' => 'venue_type_id',
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
        $rules->add($rules->existsIn(['venue_type_id'], 'VenueTypes'));

        return $rules;
    }
}
