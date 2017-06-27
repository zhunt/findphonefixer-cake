<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link http://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadHelper('Html');
        $this->loadHelper('Form');
        $this->loadHelper('Flash');
        $this->loadHelper('Venue'); // used in venue view


        $this->loadHelper('Paginator');

        // Foundation classes: current
        //
        $this->Paginator->setTemplates([
            'current' => '<li class="current"><span class="show-for-sr"></span>{{text}}</li>',
            'nextDisabled' => '<li class="pagination-next disabled">{{text}}</li>',
            'prevDisabled' => '<li class="pagination-previous disabled">{{text}}</li>',
            'nextActive' => '<li class="pagination-next"><a rel="next" href="{{url}}">{{text}}</a></li>',
            'prevActive' => '<li class="pagination-previous"><a rel="prev" href="{{url}}">{{text}}</a></li>',
            'first' => '<li class="first"><a href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="last"><a href="{{url}}">{{text}}</a></li>',


                        // pagination-next

                        // <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
                        // <li class="pagination-previous disabled">Previous <span class="show-for-sr">page</span></li>
                        /*
                        // <ul class="pagination" role="navigation" aria-label="Pagination"

            'nextActive' => '<li class="next"><a rel="next" href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="next disabled"><a href="" onclick="return false;">{{text}}</a></li>',
            'prevActive' => '<li class="prev"><a rel="prev" href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="prev disabled"><a href="" onclick="return false;">{{text}}</a></li>',
            'counterRange' => '{{start}} - {{end}} of {{count}}',
            'counterPages' => '{{page}} of {{pages}}',
            'first' => '<li class="first"><a href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="last"><a href="{{url}}">{{text}}</a></li>',
            'number' => '<li><a href="{{url}}">{{text}}</a></li>',
            //'current' => '<li class="active"><a href="">{{text}}</a></li>',
            'ellipsis' => '<li class="ellipsis">&hellip;</li>',
            'sort' => '<a href="{{url}}">{{text}}</a>',
            'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
            'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
            'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
            'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',

*/

        ]);


    }
}
