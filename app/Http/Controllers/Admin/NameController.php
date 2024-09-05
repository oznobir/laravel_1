<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NameRequest;
use App\Models\Name;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class NameController extends AdminController
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->checkGate('show-names');

        $names = Name::get();
        return view('admin.names.index', compact('names'));

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

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function store(NameRequest $request): Application|Redirector|RedirectResponse
    {
        $this->checkGate('create-names');

        Name::create($request->validated());
        return redirect(route('admin.names.index'));

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

    /**
     * Store a newly created resource in storage.
     *
     * @return Factory|View|Application
     * @throws AuthorizationException
     */
    public function create (): Factory|View|Application
    {
        $this->checkGate('create-names');

        return view('admin.names.create');
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show(Name $name): Factory|View|Application
    {
        $this->checkGate('show-names');

        return view('admin.names.edit', [
            'name' => $name,
        ]);

//        $name = Name::findOrFail($id);
//        dump($name->fullName);
//        dd($name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Name $name
     * @return Factory|View|Application
     * @throws AuthorizationException
     */
    public function edit(Name $name): Factory|View|Application
    {
        $this->checkGate('edit-names');

        return view('admin.names.edit', [
            'name' => $name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NameRequest $request
     * @param Name $name
     * @return Application|Redirector|RedirectResponse
     * @throws AuthorizationException
     */
    public function update(NameRequest $request, Name $name): Application|Redirector|RedirectResponse
    {
        $this->checkGate('edit-names');

        $name->update($request->validated());
        return redirect(route('admin.names.index'));

//        $name = Name::find($id);
//        $name->last_name = 'Новик';
//        $name->save();
//        echo 'Изменена фамилия на Новик';

//        $name = Name::find($id)->update(['last_name' => 'Вовик']);
//        dump($name);
//        echo 'Изменена фамилия на Вовик';
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Name $name): Application|Redirector|RedirectResponse
    {
        $this->checkGate('delete-names');

        Name::destroy($name);
        return redirect(route('admin.names.index'));

//        Name::find($id)->delete();
//        echo 'Удалена запись с id ' . $id;

//        Name::destroy($id);
//        $name = Name::find($id);
//        dump($name);
//        echo 'Удалена запись с id ' . $id;
    }

}
