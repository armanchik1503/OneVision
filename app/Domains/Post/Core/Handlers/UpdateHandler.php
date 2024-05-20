<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Domains\Post\Core\DTO\FormRequest\Post\UpdateRequestDTO;
use App\Domains\Post\Core\Handlers\DummyJson\UpdateHandler as DummyJsonUpdateHandler;
use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class UpdateHandler
 */
final readonly class UpdateHandler
{
    /**
     * @param \App\Domains\Post\Core\Handlers\DummyJson\UpdateHandler $dummyJsonUpdateHandler
     */
    public function __construct(
        private DummyJsonUpdateHandler $dummyJsonUpdateHandler
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
           $this->dummyJsonUpdateHandler->handle($dto, $post->dummy_post_id);

           return $post;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return null;
    }
}