<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiService;
use App\Core\Services\Microservices\DTO\DummyJson\GetDTO;
use App\Domains\Post\Core\ValueObjects\Services\DummyJson\ManageRequestVO;
use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Class ShowHandler
 */
final readonly class ShowHandler
{
    /**
     * @param \App\Core\Contracts\Services\Microservices\DummyJson\ApiService $dummyJsonService
     */
    public function __construct(
        private DummyJsonApiService $dummyJsonService
    ) {
    }

    public function handle(Post $post): Model|null
    {
        try {
            $service = $this->dummyJsonService->get(new GetDTO($post->dummy_post_id));

            $post->setAttribute('dummy_json', ManageRequestVO::fromArray($service));

            return $post;
        } catch (Exception $e) {
            Log::error('Failed to get dummy json data', [
                'exception' => $e->getMessage(),
                'post_id'   => $post->id
            ]);
        }

        return null;
    }
}
