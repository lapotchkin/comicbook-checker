<?php
return [
    'comicvine'         => is_readable(__DIR__ . '/comicvine.local.php')
        ? require __DIR__ . '/comicvine.local.php'
        : [
            'api_url' => 'https://comicvine.gamespot.com/api',
            'api_key' => '',
        ],
    'user'              => is_readable(__DIR__ . '/user.local.php')
        ? require __DIR__ . '/user.local.php'
        : [
            'login' => '',
            'pass'  => '',
        ],
    // The path map of the application components
    'componentsRootMap' => [
        'models'      => '/models',
        'controllers' => '/controllers',
        'views'       => '/views/views',
        'layouts'     => '/views/layouts',
        'snippets'    => '/views/snippets',
        'images'      => '/web/assets/imgs',
        'js'          => '/web/js',
        'css'         => '/web/css',
    ],
    // The default name of the layout
    'defaultLayout'     => 'main',
    // The routing table that contains the correspondence between the request URL
    // and the Controller-Action pair
    'routeMap'          => [
        'cli'    => [
            '--test' => [
                'ctrl' => ['Cli', 'actionTest'],
            ],
        ],
        'get'    => [
            '/'  => [
                'ctrl' => ['Main', 'actionDefault'],
                'auth' => TRUE,
            ],
            '.*' => [
                'ctrl' => ['System', 'actionPage404'],
                'auth' => FALSE,
            ],
        ],
        'post'   => [
            '.*' => [
                'ctrl' => ['System', 'actionPage404'],
                'auth' => FALSE,
            ],
        ],
        'put'    => [
            '.*' => [
                'ctrl' => ['System', 'actionPage404'],
                'auth' => FALSE,
            ],
        ],
        'delete' => [
            '.*' => [
                'ctrl' => ['System', 'actionPage404'],
                'auth' => FALSE,
            ],
        ],
    ],
    // Database settings
    'db'                => is_readable(__DIR__ . '/db.local.php')
        ? require __DIR__ . '/db.local.php'
        : [
            'host'     => '',
            'username' => '',
            'password' => '',
            'dbname'   => '',
            'charset'  => '',
        ],
];
