<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers\DummyJson;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO;
use App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO;
use App\Domains\Post\Core\DTO\FormRequest\Post\UpdateRequestDTO;

/**
 * Class GetDataHandler
 */
final readonly class DeleteHandler
{
    /**
     * @param \App\Core\Contracts\Services\Microservices\DummyJson\ApiService $dummyJsonService
     */
    public function __construct(
        private DummyJsonApiService $dummyJsonService
    ) {
    }

    /**
     * @param int $postId
     *
     * @return array
     */
    public function handle(int $postId): array
    {
        return $this->dummyJsonService->delete(new DeleteDTO($postId));
    }
}