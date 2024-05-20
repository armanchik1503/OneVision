<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Domains\Post\Core\Handlers\DummyJson\GetHandler;
use App\Domains\Post\Core\ValueObjects\Services\DummyJson\ManageRequestVO;
use App\Domains\Post\Models\Post;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

/**
 * Class IndexHandler
 */
final readonly class IndexHandler
{
    /**
     * @param \App\Domains\Post\Core\Handlers\DummyJson\GetHandler $dummyJsonGetHandler
     */
    public function __construct(
        private GetHandler $dummyJsonGetHandler
    ) {
    }

    public function handle(): LengthAwarePaginator|array
    {
        try {
            $posts = Post::with('author')
                         ->paginate(
                             pageName: 'cursor',
                         );

            $posts->setCollection(collect($this->modifyData($posts->items())));

            return $posts;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return [];
    }

    private function modifyData(array $items): array
    {
        $modifiedItems = [];

        foreach ($items as $item) {
            $dummyPostId = $item->dummy_post_id;

            try {
                $service = $this->dummyJsonGetHandler->handle($dummyPostId);
                $item->setAttribute('dummy_json', ManageRequestVO::fromArray($service));
            } catch (Exception $e) {
                Log::error($e->getMessage());

                continue;
            }

            $modifiedItems[] = $item;
        }

        return $modifiedItems;
    }
}
