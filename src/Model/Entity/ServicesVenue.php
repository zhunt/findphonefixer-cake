<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServicesVenue Entity
 *
 * @property int $venue_id
 * @property int $service_id
 *
 * @property \App\Model\Entity\Venue $venue
 * @property \App\Model\Entity\Service $service
 */
class ServicesVenue extends Entity
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
        'service_id' => false
    ];
}
