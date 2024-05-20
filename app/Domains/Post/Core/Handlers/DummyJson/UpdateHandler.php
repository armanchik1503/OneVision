<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers\DummyJson;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO;
use App\Domains\Post\Core\DTO\FormRequest\Post\UpdateRequestDTO;

/**
 * Class GetDataHandler
 */
final readonly class UpdateHandler
{
    /**
     * @param \App\Core\Contracts\Services\Microservices\DummyJson\ApiService $dummyJsonService
     */
    public function __construct(
        private DummyJsonApiService $dummyJsonService
    ) {
    }

    /**
     * @param \App\Domains\Post\Core\DTO\FormRequest\Post\UpdateRequestDTO $dto
     * @param int                                                          $postId
     *
     * @return array
     */
    public function handle(UpdateRequestDTO $dto, int $postId): array
    {
        return $this->dummyJsonService->update(new UpdateDTO($dto->title, $dto->body, $postId));
    }
}