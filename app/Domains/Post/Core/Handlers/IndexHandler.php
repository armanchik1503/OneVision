<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Domains\Post\Core\Collections\Services\DummyJson\ManageCollection as DummyJsonCollection;
use App\Domains\Post\Core\Handlers\DummyJson\GetHandler;
use App\Domains\Post\Core\ValueObjects\Services\DummyJson\ManageRequestVO;
use App\Domains\Post\Models\Post;
use Exception;
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

    public function handle()
    {
        try {
            $posts = Post::with('author')
                         ->paginate(
                             pageName: 'cursor',
                         );

            $this->modifyData($posts->items());

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
                $data               = $this->dummyJsonGetHandler->handle($dummyPostId);
                $item['dummy_json'] = ManageRequestVO::fromArray($data);
            } catch (Exception $e) {
                Log::error($e->getMessage());

                continue;
            }

            $modifiedItems[] = $item;
        }

        return $modifiedItems;
    }
}
