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

    public function handle(UpdateRequestDTO $dto, Post $post): ?array
    {
        try {
           return $this->dummyJsonUpdateHandler->handle($dto, $post->id);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return [];
    }
}