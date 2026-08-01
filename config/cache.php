<?php

return [
    'default' => env('CACHE_DRIVER', 'file'),

    'stores' => [
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => env('DB_CONNECTION'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'cache',
        ],
    ],

    'prefix' => env('CACHE_PREFIX', str_replace('-', '_', env('APP_NAME', 'laravel')).'_cache'),
];
