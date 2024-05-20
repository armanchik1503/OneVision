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
     * Display a listing of the resource.
     */
    public function index(IndexHandler $handler): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = $handler->handle();

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, CreateHandler $handler): RedirectResponse
    {
        $post = $handler->handle($request->getDto());

        return to_route('post.show', $post)
            ->with('message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, ShowHandler $handler): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = $handler->handle($post);

        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post, UpdateHandler $handler): RedirectResponse
    {
        $post = $handler->handle($request->getDto(), $post);

        return to_route('post.show', ['post' => $post->id])
            ->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, DeleteHandler $handler): RedirectResponse
    {
        $handler->handle($post);

        return to_route('post.index')
            ->with('message', 'Post Deleted successfully');
    }
}
