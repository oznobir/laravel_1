<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChirpRequest;
use App\Models\Chirp;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(ChirpRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $post = Post::findOrFail($validated['post_id']);
        $post->chirps()->create($validated);

        return redirect(route('posts.show', $post));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ChirpRequest $request, Chirp $chirp): RedirectResponse
    {
//        Gate::authorize('update', $chirp);
//        dd($request);
        $validated = $request->validated();
//        dd($validated);
        $post = Post::findOrFail($validated['post_id']);
        $chirp->update($validated['message']);

        return redirect(route('posts.show', $post));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        Gate::authorize('delete', $chirp);

        $id = $request->input('post_id')->validated();
        $post = Post::findOrFail($id);
        $chirp->delete();
        return redirect(route('posts.show', $post));
    }
}
