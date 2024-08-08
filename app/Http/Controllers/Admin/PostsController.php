<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Factory|View|Application
     */
    public function show(Post $post): Factory|View|Application
    {
        return view('admin.posts.edit-form', compact('post'));

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
        return view('admin.posts.create-form');
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $data = Validator::make($request->all(), [
            'title' => 'required|between:2,150',
            'preview' => 'required|between:2,50',
            'description' => 'required|between:2,255',
        ], [
            'required' => 'Не заполнено поле :attribute',
            'between' => 'Поле :attribute должно содержать не менее - :min и не более - :max символа(ов)',
        ], [
            'title' => 'Заголовок статьи',
            'preview' => 'Краткое описание статьи',
            'description' => 'Текст статьи',
        ])->validate();

        Post::create($data);
        return redirect(route('admin.posts.index'));
//        Post::create(['title' => 'test', 'description' => 'some text']);
//        echo 'Новый пост создан';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Application|Redirector|RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Post $post): Application|Redirector|RedirectResponse
    {
        $data = Validator::make($request->all(), [
            'title' => 'required|between:2,150',
            'preview' => 'required|between:2,50',
            'description' => 'required|between:2,255',
        ], [
            'required' => 'Не заполнено поле :attribute',
            'between' => 'Поле :attribute должно содержать не менее - :min и не более - :max символа(ов)',
        ], [
            'title' => 'Заголовок статьи',
            'preview' => 'Краткое описание статьи',
            'description' => 'Текст статьи',
        ])->validate();

        $post->update($data);
        return redirect(route('admin.posts.index'));
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
        return redirect(route('admin.posts.index'));
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
