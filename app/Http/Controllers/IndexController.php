<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    /**
     *  Display the index view.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $posts = Post::latest()->limit(3)->get();
        return view('dashboard', compact('posts'));
    }
}
