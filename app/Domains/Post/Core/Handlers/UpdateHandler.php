<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO;
use App\Domains\Post\Core\DTO\FormRequest\Post\UpdateRequestDTO;
use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class UpdateHandler
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
     * @param \App\Domains\Post\Models\Post                                $post
     *
     * @return \App\Domains\Post\Models\Post|null
     */
    public function handle(UpdateRequestDTO $dto, Post $post): ?Post
    {
        try {
            $this->dummyJsonService->update(new UpdateDTO($dto->title, $dto->body, $post->dummy_post_id));

            return $post;
        } catch (Exception $e) {
            Log::error('Failed to update dummy json data', [
                'exception' => $e->getMessage(),
                'post_id'   => $post->id,
            ]);
        }

        return null;
    }
}