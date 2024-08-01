<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }
    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Factory|View|Application
     */
    public function show($id): Factory|View|Application
    {
        $post = Post::find($id);
        return view('posts.store-form', compact('post'));

//        $post = Post::findOrFail($id);
//        dd($post);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('posts.store-form');
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'title' => 'required|between:2,150',
            'description' => 'required|between:2,255',
        ], [
            'required' => 'Не заполнено поле :attribute',
            'between' => 'Поле :attribute должно содержать не менее - :min и не более - :max символа(ов)',
        ], [
            'title' => 'Заголовок поста',
            'description' => 'Текст поста',
        ])->validate();
        return redirect(route('posts.index'));
//        Post::create(['title' => 'test', 'description' => 'some text']);
//        echo 'Новый пост создан';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id): Application|Redirector|RedirectResponse
    {
        Post::destroy($id);
        return redirect(route('posts.index'));
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
