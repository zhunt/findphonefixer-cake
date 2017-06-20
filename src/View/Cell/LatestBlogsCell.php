<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Http\Client;



/**
 * LatestBlogs cell
 */
class LatestBlogsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {

        // http://findphonefixer.com/blog/wp-json/wp/v2/posts?search=android&orderby=date&_embed&per_page=3
        $http = new Client();

        $response = $http->get('http://findphonefixer.com/blog/wp-json/wp/v2/posts', [ /*'search' => 'android', */ 'orderby' => 'date', 'per_page' => 3, '_embed' => true ]);

        $wpData = json_decode( $response->body(), true );

        $data = [];

        if ($wpData) {
            foreach( $wpData as $i => $row ) {
                $data[$i] = [
                    'date' =>   $row['date'],
                    'url' =>    $row['link'],
                    'title' =>  $row['title']['rendered'],
                    'text'  =>  strip_tags($row['excerpt']['rendered']),
                    'image' => $row['_embedded']['wp:featuredmedia']['0']['media_details']['sizes']['thumbnail']['source_url']

                ];
            }
        }

        //debug($data);

        $this->set('blogs', $data);

    }
}
