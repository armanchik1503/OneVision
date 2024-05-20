<?php

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiContract;
use App\Core\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DummyJson\MockService as DummyJsonMockService;

return [
    'http_timeout' => env('MICROSERVICES_HTTP_TIMEOUT', 5),

    'services' => [
        'dummy_json' => [
            'host'     => env('MICROSERVICE_DUMMY_JSON', '127.0.0.1'),
            'abstract' => DummyJsonApiContract::class,
            'concrete' => DummyJsonApiService::class,
            'mock'     => DummyJsonMockService::class,
        ],
    ],
];
