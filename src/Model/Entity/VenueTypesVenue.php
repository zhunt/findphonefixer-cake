<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VenueTypesVenue Entity
 *
 * @property int $venue_id
 * @property int $venue_type_id
 *
 * @property \App\Model\Entity\Venue $venue
 * @property \App\Model\Entity\VenueType $venue_type
 */
class VenueTypesVenue extends Entity
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
        'venue_id' => false,
        'venue_type_id' => false
    ];
}
