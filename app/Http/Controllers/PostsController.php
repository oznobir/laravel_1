<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PostsController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts = Post::get();
        return view('posts', compact('posts'));
    }

    /**
     * @return void
     */
    public function create(): void
    {
        Post::create(['title' => 'test', 'description' => 'some text']);
        echo 'Новый пост создан';
    }

    /**
     * @return void
     */
    public function deleteLast(): void
    {
        Post::latest()->first()->delete();
        echo 'Последний пост удален';
    }
}
