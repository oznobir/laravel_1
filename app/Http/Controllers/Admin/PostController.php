<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $posts = Post::query()
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view('admin.posts.create');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param Post $post
//     */
//    public function show(Post $post)
//    {
////        $post = Post::findOrFail($id);
////        dd($post);
//    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        Post::create($request->validated());
        return redirect(route('admin.posts.index'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): Factory|View|Application
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     */
    public function update(PostRequest $request, Post $post): Application|Redirector|RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('storage/posts');
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
     */
    public function destroy(Post $post): Application|Redirector|RedirectResponse
    {
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
