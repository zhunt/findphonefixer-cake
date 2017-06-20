<?php
namespace App\View\Cell;

use Cake\View\Cell;




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


        //debug($data);
        // add caching

        $this->loadModel('Articles');

        $this->set('blogs', $this->Articles->getLatestBlogs() );

    }
}
