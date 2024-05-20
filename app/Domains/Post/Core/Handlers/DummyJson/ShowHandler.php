<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers\DummyJson;

use App\Domains\Post\Core\Handlers\DummyJson\GetHandler as DummyJsonGetHandler;
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
     * @param \App\Domains\Post\Core\Handlers\DummyJson\GetHandler $dummyJsonGetHandler
     */
    public function __construct(
        private DummyJsonGetHandler $dummyJsonGetHandler
    ) {
    }

    public function handle(Post $post): Model|null
    {
        try {
            $service = $this->dummyJsonGetHandler->handle($post->dummy_post_id);
            $post->setAttribute('dummy_json', ManageRequestVO::fromArray($service));

            return $post;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return null;
    }
}
