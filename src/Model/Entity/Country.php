<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Country Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $seo_title
 * @property string $seo_desc
 * @property string $intro_text
 *
 * @property \App\Model\Entity\City[] $cities
 * @property \App\Model\Entity\Province[] $provinces
 * @property \App\Model\Entity\Venue[] $venues
 */
class Country extends Entity
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
