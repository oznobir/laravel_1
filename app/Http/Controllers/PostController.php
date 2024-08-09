<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChirpRequest;
use App\Models\Chirp;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $posts =  Post::query()->orderBy('created_at', 'DESC')->paginate(3);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * @param Post $post
     * @return Factory|View|Application
     */
    public function show(Post $post): Factory|View|Application
    {
//        $post = Post::findOrFail($id);
        return view('posts.show', [
            'post' => $post
        ]);
    }
    public function chirp(Post $post, Chirp $chirp): View
    {
        Gate::authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
            'post' => $post,
        ]);
    }

//    /**
//     * @param ChirpRequest $request
//     * @param int $id
//     * @return Application|Redirector|RedirectResponse
//     */
//    public function chirp(ChirpRequest $request, int $id): Application|Redirector|RedirectResponse
//    {
//        $post = Post::findOrFail($id);
//        $post->chirps()->create($request->validated());
//
//        return redirect(route('posts.show', $id));
//    }
}
