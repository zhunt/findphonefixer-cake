<?php


return [
    'Users.SimpleRbac.permissions' => [

        [
            'role' => 'user',
            'controller' => 'Cities',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'CityRegions',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'Venues',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'Brands',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'Chains',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'Products',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'Services',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'VenueTypes',
            'action' => ['index', 'edit', 'add', 'delete'],

        ],
        [
            'role' => 'user',
            'controller' => 'batch-venues',
            'action' => ['index', 'edit', 'add', 'delete', 'load-csv-file', 'loadCsvFile', 'geocodeAddress'],

        ]

    ]
];
