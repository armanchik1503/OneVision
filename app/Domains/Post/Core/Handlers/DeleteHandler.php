<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Domains\Post\Core\Handlers\DummyJson\DeleteHandler as DummyJsonDeleteHandler;
use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class DeleteHandler
 */
readonly class DeleteHandler
{
    /**
     * @param \App\Domains\Post\Core\Handlers\DummyJson\DeleteHandler $dummyJsonDeleteHandler
     */
    public function __construct(
        private DummyJsonDeleteHandler $dummyJsonDeleteHandler
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
            $this->dummyJsonDeleteHandler->handle($post->id);

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
