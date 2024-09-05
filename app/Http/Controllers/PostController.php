<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PostController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $posts =  Post::query()
            ->orderByDesc('created_at')
            ->paginate(3);
        return view('posts.index',compact('posts'));
    }

    /**
     * @param Post $post
     * @return Factory|View|Application
     */
    public function show(Post $post): Factory|View|Application
    {
        $chirps = $post->chirps()->with(['user'])->latest()->get();
        return view('posts.show', compact('post', 'chirps'));
    }
}
