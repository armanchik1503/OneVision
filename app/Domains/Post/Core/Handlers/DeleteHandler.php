<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class DeleteHandler
 */
class DeleteHandler
{
    /**
     * @param \App\Domains\Post\Models\Post $post
     *
     * @return bool
     */
    public function handle(Post $post): bool
    {
        try {
            return $post->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return false;
    }
}
