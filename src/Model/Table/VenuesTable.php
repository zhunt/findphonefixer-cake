<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Venues Model
 *
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\ProvincesTable|\Cake\ORM\Association\BelongsTo $Provinces
 * @property \App\Model\Table\CityRegionsTable|\Cake\ORM\Association\BelongsTo $CityRegions
 * @property \App\Model\Table\MallsTable|\Cake\ORM\Association\BelongsTo $Malls
 * @property \App\Model\Table\ChainsTable|\Cake\ORM\Association\BelongsTo $Chains
 * @property \App\Model\Table\AmenitiesTable|\Cake\ORM\Association\BelongsToMany $Amenities
 * @property \App\Model\Table\BrandsTable|\Cake\ORM\Association\BelongsToMany $Brands
 * @property \App\Model\Table\CuisinesTable|\Cake\ORM\Association\BelongsToMany $Cuisines
 * @property \App\Model\Table\LanguagesTable|\Cake\ORM\Association\BelongsToMany $Languages
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsToMany $Products
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsToMany $Services
 * @property \App\Model\Table\VenueTypesTable|\Cake\ORM\Association\BelongsToMany $VenueTypes
 *
 * @method \App\Model\Entity\Venue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Venue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Venue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Venue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VenuesTable extends Table
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

        $this->setTable('venues');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Muffin/Slug.Slug');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);
        $this->belongsTo('Provinces', [
            'foreignKey' => 'province_id'
        ]);
        $this->belongsTo('CityRegions', [
            'foreignKey' => 'city_region_id'
        ]);
        $this->belongsTo('Malls', [
            'foreignKey' => 'mall_id'
        ]);
        $this->belongsTo('Chains', [
            'foreignKey' => 'chain_id'
        ]);
        $this->belongsToMany('Amenities', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'amenity_id',
            'joinTable' => 'amenities_venues'
        ]);
        $this->belongsToMany('Brands', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'brand_id',
            'joinTable' => 'brands_venues'
        ]);
        $this->belongsToMany('Cuisines', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'cuisine_id',
            'joinTable' => 'cuisines_venues'
        ]);
        $this->belongsToMany('Languages', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'language_id',
            'joinTable' => 'languages_venues'
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'products_venues'
        ]);
        $this->belongsToMany('Services', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'service_id',
            'joinTable' => 'services_venues'
        ]);
        $this->belongsToMany('VenueTypes', [
            'foreignKey' => 'venue_id',
            'targetForeignKey' => 'venue_type_id',
            'joinTable' => 'venue_types_venues'
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
            ->allowEmpty('sub_name');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->allowEmpty('seo_title');

        $validator
            ->allowEmpty('seo_desc');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('display_address');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('website');

        $validator
            ->allowEmpty('photos');

        $validator
            ->allowEmpty('hours_holiday');

        $validator
            ->allowEmpty('hours_mon');

        $validator
            ->allowEmpty('hours_tue');

        $validator
            ->allowEmpty('hours_wed');

        $validator
            ->allowEmpty('hours_thu');

        $validator
            ->allowEmpty('hours_fri');

        $validator
            ->allowEmpty('hours_sat');

        $validator
            ->allowEmpty('hours_sun');

        $validator
            ->numeric('geo_latt')
            ->allowEmpty('geo_latt');

        $validator
            ->numeric('geo_long')
            ->allowEmpty('geo_long');

        $validator
            ->allowEmpty('admin_level_2');

        $validator
            ->boolean('flag_is_mall')
            ->allowEmpty('flag_is_mall');

        $validator
            ->dateTime('last_update')
            ->allowEmpty('last_update');

        $validator
            ->boolean('flag_featured')
            ->allowEmpty('flag_featured');

        $validator
            ->numeric('rating')
            ->allowEmpty('rating');

        $validator
            ->boolean('flag_published')
            ->allowEmpty('flag_published');

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
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['province_id'], 'Provinces'));
        $rules->add($rules->existsIn(['city_region_id'], 'CityRegions'));
        $rules->add($rules->existsIn(['mall_id'], 'Malls'));
        $rules->add($rules->existsIn(['chain_id'], 'Chains'));

        return $rules;
    }

    /* custom find methods */

    public function findHomepageVenues(Query $query) {
        return $query->where( [ 'Venues.flag_published' => true ])
            ->contain( ['Cities' => ['fields' => ['id', 'name', 'slug'] ], 'VenueTypes' => ['fields' => ['id', 'VenueTypesVenues.venue_id', 'name'] ] ] );
    }


    /* based on the latt/long passed in, get a list of venues a distance from that point
 * function returns distance in Km
 */
    // pass in:  ['geo_latt', 'geo_long', 'venueId' ]
    function findNearbyVenues(Query $query, $options) {
        $distance = 10; // 1 = 1000 metres, 10 = 10km
        $limit = 10;

        $venueLat = floatval( $options['geoLatt'] );
        $venueLng = floatval( $options['geoLong']);
        $venueId = intval($options['venueId']);

        $distanceField =
            '(6371 * acos( cos( radians(:latitude) ) * cos( radians( Venues.geo_latt ) ) *
                                cos( radians( Venues.geo_long ) - radians(:longitude) ) + sin( radians(:latitude) ) *
                                sin( radians( Venues.geo_latt ) ) ) )';

        return $query
            ->where([ 'Venues.flag_published' => 1, 'Venues.id !=' => $venueId, 'geo_latt IS NOT NULL'  ])
            ->select(['id', 'name', 'sub_name', 'slug', 'address', 'geo_latt', 'geo_long', 'distance' => $distanceField])
            ->limit($limit)
            ->group('Venues.id')
            ->having(['distance <=' => $distance])
            ->order('distance ASC')
            ->bind(':latitude', $venueLat, 'float')
            ->bind(':longitude', $venueLng, 'float');

    }

}
