<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\Handlers;

use App\Domains\Post\Core\Handlers\DummyJson\GetHandler;
use App\Domains\Post\Models\Post;
use Exception;

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

            dd($this->modifyData($posts->items()));

//        $this->dummyJsonService->get(new GetDTO())
        } catch (Exception $exception) {

        }

        return [];
    }

    private function modifyData(array $items): array
    {
        return array_map(function ($item) {
            $dummyPostId = $item->dummy_post_id;

            $data = $this->dummyJsonGetHandler->handle($dummyPostId);
            dd($data);
        }, $items);
    }
}
