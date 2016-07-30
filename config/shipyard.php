<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16-7-30
 */

return [
    'default' => 'main',
    'connections' => [
        'main' => [
            'id' => 'your-application-id',
            'service_key' => env('SHIPYARD_SERVICE_KEY', 'your-api-key'),
        ],
        'token' => [
            'id' => 'your-application-id',
            'token' => 'token'
        ]
    ],
    'base_url' => env('SHIPYARD_BASE_URL', 'https://localhost:8080/v1/')
];