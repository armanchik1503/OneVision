<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers\DummyJson;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\CreateDTO;
use App\Domains\Post\Core\DTO\FormRequest\Post\CreateRequestDTO;

/**
 * Class CreateHandler
 */
final readonly class CreateHandler
{
    /**
     * @param \App\Core\Contracts\Services\Microservices\DummyJson\ApiService $dummyJsonService
     */
    public function __construct(
        private DummyJsonApiService $dummyJsonService
    ) {
    }

    /**
     * @param \App\Domains\Post\Core\DTO\FormRequest\Post\CreateRequestDTO $dto
     * @param int                                                          $userId
     *
     * @return array
     */
    public function handle(CreateRequestDTO $dto, int $userId): array
    {
        return $this->dummyJsonService->create(new CreateDTO($dto->title, $dto->body, $userId));
    }
}