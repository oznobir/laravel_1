<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChirpRequest;
use App\Models\Chirp;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChirpController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     * @throws AuthorizationException
     */
    public function index(): Factory|View|Application
    {
        $this->checkGate('show-chirps');

        $chirps = Chirp::with('user')->latest()->paginate(3);
        return view('admin.chirps.index', [
            'chirps' => $chirps,
        ]);
        //        return view('chirps.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(ChirpRequest $request): RedirectResponse
    {
        $this->checkGate('create-chirps');

        Chirp::create($request->validated());
        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(Chirp $chirp): View
    {
        $this->checkGate('edit-chirps');

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        $this->checkGate('edit-chirps');

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        $chirp->update($validated);
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->checkGate('delete-chirps');

        $chirp->delete();
        return redirect(route('chirps.index'));
    }
}
