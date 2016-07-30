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
            'key' => 'your-api-key',
        ],
    ],
    'base_url' => env('SHIPYARD_BASE_URL')
];