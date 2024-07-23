<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class NamesController extends Controller
{
    #[NoReturn] public function index(): void
    {
        $names = Name::where('first_name', 'like', '%р%')->get();
        dd($names);

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
}
