<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Name;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class PostController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->checkGate('show-posts');

        $posts = Post::query()
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): Factory|View|Application
    {
        $this->checkGate('create-posts');

        return view('admin.posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Factory|View|Application
     * @throws AuthorizationException
     */
    public function show(Post $post): Application|View|Factory
    {
        $this->checkGate('show-posts');

        return view('admin.posts.show', [
            'post' => $post,
        ]);
////        $post = Post::findOrFail($id);
////        dd($post);
    }


    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $this->checkGate('create-posts');

        Post::create($request->validated());
        return redirect(route('admin.posts.index'));

    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(Post $post): Factory|View|Application
    {
        $this->checkGate('edit-posts');

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     * @throws AuthorizationException
     */
    public function update(PostRequest $request, Post $post): Application|Redirector|RedirectResponse
    {
        $this->checkGate('edit-posts');

        $data = $request->validated();
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('posts', 'public');
            $data['thumbnail'] = $thumbnail;
        }
        $post->update($data);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Post $post): Application|Redirector|RedirectResponse
    {
        $this->checkGate('delete-posts');

        $post->delete();
        return redirect(route('admin.posts.index'));
    }


//    /**
//     * @return void
//     */
//    public function deleteLast(): void
//    {
//        Post::latest()->first()->delete();
//        echo 'Последний пост удален';
//    }

}
