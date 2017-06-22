<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Core\Configure;
use Cake\Http\Client;


/**
 * Articles Model
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->dateTime('date')
            ->allowEmpty('date');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('excerpt');

        $validator
            ->allowEmpty('body');

        $validator
            ->allowEmpty('feature_image');

        $validator
            ->dateTime('modifed')
            ->allowEmpty('modifed');

        return $validator;
    }

    /*
     * Update this table to sync with wp table
     */

    public function reSyncWithWordPress() {
        // to-to, using wordpress url, re-sync this table with contents from WP REST

    }

    /* */
    public function  getLatestBlogs( $searchParams = null ) {
        $http = new Client();

       // $searchParams = ['search' => 'tips'];

        $wpParams = [
            'orderby' => 'date',
            'per_page' => 3,
            '_embed' => true ];

        if ( !empty($searchParams) && is_array($searchParams) ) {
            // should allow overwriting other fields (orderby, etc.) if passed in $searchParams
            $wpParams = array_merge($wpParams, $searchParams );
        }

        $response = $http->get( Configure::read('wpRestApi'), $wpParams);

        $wpData = json_decode( $response->body(), true );

        $data = [];

        if (!empty($wpData)) {
            foreach( $wpData as $i => $row ) {
                $data[$i] = [
                    'date' =>   $row['date'],
                    'url' =>    $row['link'],
                    'title' =>  $row['title']['rendered'],
                    'text'  =>  strip_tags($row['excerpt']['rendered']),
                    'image' => $row['_embedded']['wp:featuredmedia']['0']['media_details']['sizes']['thumbnail']['source_url']
                ];
                // TODO: update Articles database table here
            }
        }

        return($data);
    }
}
