<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsVenues Model
 *
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsTo $Venues
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ProductsVenue get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsVenue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsVenue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsVenue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsVenue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsVenue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsVenue findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsVenuesTable extends Table
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

        $this->setTable('products_venues');
        $this->setDisplayField('venue_id');
        $this->setPrimaryKey(['venue_id', 'product_id']);

        $this->belongsTo('Venues', [
            'foreignKey' => 'venue_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
