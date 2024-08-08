<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts =  Post::query()->orderBy('created_at', 'Desc')->paginate(3);
        return view('dashboard', [
            'posts' => $posts
        ]);
    }
}
