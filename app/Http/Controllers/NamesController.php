<?php

namespace App\Http\Controllers;

use App\Models\Name;
use JetBrains\PhpStorm\NoReturn;

class NamesController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $names = Name::namesOnChar('И')->get();
        dd($names);

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

    #[NoReturn] public function show($id): void
    {
        $name = Name::findOrFail($id);
        dd($name);
    }

    public function createNew(): void
    {
//        $name = new Name;
//        $name->first_name = 'Света';
//        $name->last_name = 'Светлова';
//        $name->save();
//        echo 'Добавлен(а) Света Светлова';
        Name::create(['first_name' => 'Василий', 'last_name' => 'Васильев']);
        echo 'Добавлен(а) Василий Васильев';
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

    public function delete($id): void
    {
//        Name::find($id)->delete();
//        echo 'Удалена запись с id ' . $id;

        Name::destroy($id);
        $name = Name::find($id);
        dump($name);
        echo 'Удалена запись с id ' . $id;
    }
}
