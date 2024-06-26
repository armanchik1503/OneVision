<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\CreateDTO;
use App\Domains\Post\Core\DTO\FormRequest\Post\CreateRequestDTO;
use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function handle(CreateRequestDTO $dto): Model|null
    {
        try {
            $userId  = Auth::user()->id;
            $service = $this->dummyJsonService->create(
                new CreateDTO($dto->title, $dto->body, $userId)
            );

            if (filled($service)) {
                return Post::query()
                           ->create(
                               [
                                   'user_id'       => $userId,
                                   'dummy_post_id' => rand(1, 150),
                               ]
                           );
            }
        } catch (Exception $e) {
            Log::error('Failed to create dummy json data', [
                'exception' => $e->getMessage(),
                'payload'   => $dto,
            ]);
        }

        return null;
    }
}
