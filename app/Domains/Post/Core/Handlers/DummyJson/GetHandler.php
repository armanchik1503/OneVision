<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers\DummyJson;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\GetDTO;

/**
 * Class GetDataHandler
 */
final readonly class GetHandler
{
    /**
     * @param \App\Core\Contracts\Services\Microservices\DummyJson\ApiService $dummyJsonService
     */
    public function __construct(
        private DummyJsonApiService $dummyJsonService
    ) {
    }

    public function handle(int $postId): array
    {
        return $this->dummyJsonService->get(new GetDTO($postId));
    }
}