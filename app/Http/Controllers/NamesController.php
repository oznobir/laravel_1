<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use App\Models\Name;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;


/**
 * @method validate(Request $request, array $array)
 */
class NamesController extends Controller
{
    public function index(): Factory|View|Application
    {
        $names = Name::get();
        return view('names', compact('names'));

//        $names = Name::namesOnChar('И')->get();
//        dd($names);

//        $names = Name::namesOnCharP()->get();
//        dd($names);

//        $names = Name::namesOnCharP()->get();
//        dd($names);
//        $names = Name::orderByDesc('id')->get();
//        $names = Name::orderBy('id', 'DESC')->get();
//        dd($names);

//        $names = Name::all()->sortByDesc('id');
//        $names = Name::all()->sortBy('id');
//        dd($names);

//        $names = Name::where('first_name', 'like', '%р%')->get();
//        dd($names);

//        $names = Name::whereIn('id', [1, 2])->get();
//        dd($names);

//        $name = Name::find(1);
//        dd($name);
//        dd($name->first_name);

//        $names = Name::all()->find([1, 2]);
//        dd($names);

//        $names = Name::all();
//        dd($names);
    }

    public function show($id): Factory|View|Application
    {
        $name = Name::find($id);
        return view('name', compact('name'));


//        $name = Name::findOrFail($id);
//        dump($name->fullName);
//        dd($name);
    }

    public function create(NameRequest $request): RedirectResponse|Redirector|Application
    {
//        $validated = $request->validate([
//            'first_name' => 'required',
//            'last_name' => 'required',
//        ]);
        Name::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name')
        ]);
        return redirect('/');

//        Name::create($request->all());

//        dump($request->input('first_name'));
//        if (!empty($request->first_name)) {
//            dump($request->first_name);
//        }
//        dump(request()->all());
//        dump(request()->only('first_name'));
//        dump(request()->except('last_name'));
//        dump(request()->first_name);

//        $name = new Name;
//        $name->first_name = 'Света';
//        $name->last_name = 'Светлова';
//        $name->save();
//        echo 'Добавлен(а) Света Светлова';
//        Name::create(['first_name' => 'Василий', 'last_name' => 'Васильев']);
//        echo 'Добавлен(а) Василий Васильев';
    }

    public function update($id): void
    {
//        $name = Name::find($id);
//        $name->last_name = 'Новик';
//        $name->save();
//        echo 'Изменена фамилия на Новик';

        $name = Name::find($id)->update(['last_name' => 'Вовик']);
        dump($name);
        echo 'Изменена фамилия на Вовик';
    }

    public function delete($id): Application|Redirector|RedirectResponse
    {
        Name::destroy($id);
        return redirect('/names');

//        Name::find($id)->delete();
//        echo 'Удалена запись с id ' . $id;

//        Name::destroy($id);
//        $name = Name::find($id);
//        dump($name);
//        echo 'Удалена запись с id ' . $id;
    }
}
