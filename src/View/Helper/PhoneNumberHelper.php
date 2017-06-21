<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * PhoneNumber helper
 */
class PhoneNumberHelper extends Helper
{


    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = ['Html'];

    // function to try and
    public function firstNumber($data) {
        $json = json_decode($data, true);

        if ( is_array($json) && !empty($json)) {
            //debug($json);
            if (isset($json['phone'])) {
                return($json['phone']);
            }
        }
        // TODO, just single number ?
    }

}
