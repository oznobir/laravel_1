<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    /**
     * Display the index view.
     */
    public function index(): Factory|View|Application
    {
        return view('admin.index');
    }
}
