<?php


return [
    'Users.SimpleRbac.permissions' => [

        [
            'role' => 'user',
            'controller' => 'Cities',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
        [
            'role' => 'user',
            'controller' => 'CityRegions',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
        [
            'role' => 'user',
            'controller' => 'Venues',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
        [
            'role' => 'user',
            'controller' => 'Brands',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
        [
            'role' => 'user',
            'controller' => 'Chains',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
        [
            'role' => 'user',
            'controller' => 'Products',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
        [
            'role' => 'user',
            'controller' => 'Services',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
        [
            'role' => 'user',
            'controller' => 'VenueTypes',
            'action' => ['index', 'edit', 'add', 'delete'],
            'allowed' => true,
        ],
    ]
];
