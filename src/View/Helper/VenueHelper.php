<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Utility\Text;

use Cake\Core\Configure;

/**
 * Venue helper - functions for venue page
 */
class VenueHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html'];

    // returns either the city region name or prefered name if provided,
    public function getDisplayCity($venue) {

    }

    /*
     * get list of venue types
     */
    public function getVenuesTypes($venue) {
        $text = [];
        if (!empty($venue->venue_types)) {
            foreach( $venue->venue_types as $row ){
                $text[] = $row['name'];
            }
            return Text::toList($text, ', ');
        } else {
            return null;
        }

    }

    /*
     * Sort out phone number
     */



    // function to try and
    public function getFirstPhonenumber($venue) {
        $json = json_decode($venue['phone'], true);

        if ( is_array($json) && !empty($json)) {
            //debug($json);
            if (isset($json['phone'])) {
                return($json['phone']);
            }
        }
        // TODO, just single number ?
    }

    // function to try and get first website
    public function getFirstWebsite($venue) {
        $json = json_decode($venue['website'], true);

        if ( is_array($json) && !empty($json)) {
            //debug($json);
            if (isset($json['url'])) {
                return($json['url']);
            }
        }
        // TODO, just single number ?
    }


    // round a number in metres down to km with 2 decimal places, if less than 1km, use metres

    public function getDistanceInKm($distance) {

        if ($distance < 1 ) {
            return round($distance * 1000) . 'm';
        } else {
            return round($distance, 2) . 'km';
        }
    }

    /*
     * params ['force_default_image' => false ]
     */
    public function getProfileImage($venue, $params = null ) {

        $defultImage = '';
        if ( isset($params['force_default_image']) && $params['force_default_image'] == true ) {
            $defultImage = '/assets/img/placeholder-555.png';
        }

        if (!empty($venue->photos)) {
            $imageFile = json_decode($venue->photos);
            if (!empty($imageFile->image1)) {

                $pos = strrpos($imageFile->image1, '/');
                $imageFilename = $pos === false ? $imageFile->image1 : substr($imageFile->image1, $pos + 1);

                if ($imageFilename) {
                    // TODO: need check if image exits, seems to presist afte deletion
                    return cloudinary_url($imageFilename, [ "height"=>415, "quality"=>"auto", "width"=>555, "crop"=>"fill", "fetch_format"=>"auto", "cloud_name" => Configure::read('cloudinary.name') ] );
                } else {
                    return $defultImage; // '/assets/img/placeholder-555.png';
                }
            }
        } else {
            return  $defultImage; // '/assets/img/placeholder-555.png';
        }

    }
}
