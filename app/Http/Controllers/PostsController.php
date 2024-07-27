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
    public function index(): Factory|View|Application
    {
        $posts = Post::get();
        return view('posts', compact('posts'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function create(Request $request): Application|Redirector|RedirectResponse
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

        Post::create($request->all());
        return redirect('/');

//        Post::create(['title' => 'test', 'description' => 'some text']);
//        echo 'Новый пост создан';
    }

    /**
     * @return void
     */
    public function deleteLast(): void
    {
        Post::latest()->first()->delete();
        echo 'Последний пост удален';
    }

    /**
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function delete($id): Application|Redirector|RedirectResponse
    {
        Post::destroy($id);
        return redirect('/posts');
    }
}
