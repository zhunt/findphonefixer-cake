<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/', ['controller' => 'LandingPage', 'action' => 'home' ]);

    $routes->connect('/city/:slug', ['controller' => 'LandingPage', 'action' => 'city' ], [ 'pass' => ['slug'] ]);

    // display list of cities, optionally by country
    $routes->connect('/cities-list/*', ['controller' => 'LandingPage', 'action' => 'cities_list' ], [ 'pass' => ['slug'] ]);

    $routes->connect('/city_venues/:slug', ['controller' => 'Cities', 'action' => 'filterVenues' ], [ 'pass' => ['slug'] ]);

    $routes->connect('/neighbourhood/:slug', ['controller' => 'CityRegions', 'action' => 'filterVenues' ], [ 'pass' => ['slug'] ]);

    $routes->connect('/search/:filterType/:slug/:city', ['controller' => 'LandingPage', 'action' => 'filterService' ],
        [ 'pass' => ['filterType', 'slug', 'city'], 'filterType' => '[a-z0-9]+(?:-[a-z0-9]+)*', 'city' => '[a-z0-9]+(?:-[a-z0-9]+)*' ]);


    $routes->connect('/venue/:slug', ['controller' => 'Venues', 'action' => 'view' ], [ 'pass' => ['slug'] ]); // temp name

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/*
Router::scope('/admin', function (RouteBuilder $routes) {
    $routes->scope('/cities', ['controller' => 'Cities'], function (RouteBuilder $routes) {
        $routes->connect('/', ['action' => 'index']);
        $routes->fallbacks();
    });

    $routes->scope('/venues', ['controller' => 'Venues'], function (RouteBuilder $routes) {
        $routes->connect('/', ['action' => 'index']);
        $routes->fallbacks();
    });

    //$routes->connect('/profile', ['controller' => 'Users', 'action' => 'edit']);
});
*/

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
