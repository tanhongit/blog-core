<?php

$indices = [
    'mappings' => [
        'default' => [
            'properties' => [
                'id' => [
                    'type' => 'keyword',
                ],
            ],
        ],
    ],
    'settings' => [
        'default' => [
            'number_of_shards' => 1,
            'number_of_replicas' => 0,
        ],
    ],
];

// Load elasticsearch indices from the application (if available).
if (function_exists('elasticsearch_indices')) {
    $indices = elasticsearch_indices();
}

return [
    'host' => env('ELASTICSEARCH_HOST'),
    'user' => env('ELASTICSEARCH_USER'),
    'password' => env('ELASTICSEARCH_PASSWORD'),
    'cloud_id' => env('ELASTICSEARCH_CLOUD_ID'),
    'api_key' => env('ELASTICSEARCH_API_KEY'),
    'ssl_verification' => env('ELASTICSEARCH_SSL_VERIFICATION', true),
    'queue' => [
        'timeout' => env('SCOUT_QUEUE_TIMEOUT'),
    ],
    'indices' => $indices,
];
