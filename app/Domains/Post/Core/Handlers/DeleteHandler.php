<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO;
use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class DeleteHandler
 */
readonly class DeleteHandler
{
    /**
     * @param \App\Core\Contracts\Services\Microservices\DummyJson\ApiService $dummyJsonService
     */
    public function __construct(
        private DummyJsonApiService $dummyJsonService
    ) {
    }

    /**
     * @param \App\Domains\Post\Models\Post $post
     *
     * @return bool
     */
    public function handle(Post $post): bool
    {
        try {
            $this->dummyJsonService->delete(new DeleteDTO($post->id));

            return $post->delete();
        } catch (Exception $e) {
            Log::error('Failed to get dummy json data', [
                'exception' => $e->getMessage(),
                'post_id'   => $post->id,
            ]);
        }

        return false;
    }
}
