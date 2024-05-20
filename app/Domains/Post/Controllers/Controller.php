<?php

declare(strict_types=1);

namespace App\Domains\Post\Controllers;

use App\Domains\Post\Core\Handlers\CreateHandler;
use App\Domains\Post\Core\Handlers\DeleteHandler;
use App\Domains\Post\Core\Handlers\DummyJson\ShowHandler;
use App\Domains\Post\Core\Handlers\IndexHandler;
use App\Domains\Post\Core\Handlers\UpdateHandler;
use App\Domains\Post\Models\Post;
use App\Domains\Post\Requests\Post\StoreRequest;
use App\Domains\Post\Requests\Post\UpdateRequest;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

/**
 * Class PostController
 */
class Controller extends BaseController
{
    /**
     * @param \App\Domains\Post\Core\Handlers\IndexHandler $handler
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(IndexHandler $handler): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = $handler->handle();

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('post.create');
    }

    /**
     * @param \App\Domains\Post\Requests\Post\StoreRequest  $request
     * @param \App\Domains\Post\Core\Handlers\CreateHandler $handler
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request, CreateHandler $handler): RedirectResponse
    {
        $post = $handler->handle($request->getDto());

        return to_route('post.show', $post)
            ->with('message', 'Post created successfully');
    }

    /**
     * @param \App\Domains\Post\Models\Post                         $post
     * @param \App\Domains\Post\Core\Handlers\DummyJson\ShowHandler $handler
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Post $post, ShowHandler $handler): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = $handler->handle($post);

        return view('post.show', ['post' => $post]);
    }

    /**
     * @param \App\Domains\Post\Models\Post $post
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * @param \App\Domains\Post\Requests\Post\UpdateRequest $request
     * @param \App\Domains\Post\Models\Post                 $post
     * @param \App\Domains\Post\Core\Handlers\UpdateHandler $handler
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function update(UpdateRequest $request, Post $post, UpdateHandler $handler): RedirectResponse
    {
        $post = $handler->handle($request->getDto(), $post);

        return to_route('post.show', ['post' => $post->id])
            ->with('message', 'Post updated successfully');
    }

    /**
     * @param \App\Domains\Post\Models\Post                 $post
     * @param \App\Domains\Post\Core\Handlers\DeleteHandler $handler
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post, DeleteHandler $handler): RedirectResponse
    {
        $handler->handle($post);

        return to_route('post.index')
            ->with('message', 'Post Deleted successfully');
    }
}
