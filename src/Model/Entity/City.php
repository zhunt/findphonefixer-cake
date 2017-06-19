<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $seo_title
 * @property string $seo_desc
 * @property string $image_path
 * @property string $intro_text
 * @property int $province_id
 * @property int $country_id
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\CityRegion[] $city_regions
 * @property \App\Model\Entity\Mall[] $malls
 * @property \App\Model\Entity\Venue[] $venues
 */
class City extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
