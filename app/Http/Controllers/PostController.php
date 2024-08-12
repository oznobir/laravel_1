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
        return view('posts.index',compact('posts'));
    }

    /**
     * @param Post $post
     * @return Factory|View|Application
     */
    public function show(Post $post): Factory|View|Application
    {
        $chirps = $post->chirps()->latest()->get();
        return view('posts.show', compact('post', 'chirps'));
    }
    public function chirp(Post $post, Chirp $chirp): View
    {
        Gate::authorize('update', $chirp);

        return view('chirps.edit', compact('post', 'chirp'));
    }
}
