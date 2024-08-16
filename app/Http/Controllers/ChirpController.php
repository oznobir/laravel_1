<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChirpRequest;
use App\Models\Chirp;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    public function show(Post $post, Chirp $chirp): View
    {
        Gate::authorize('update', $chirp);

        return view('chirps.edit', compact('post', 'chirp'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ChirpRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();
        Chirp::create([
            'post_id' => $post->id,
            'user_id' => $validated['user_id'],
            'message' => $validated['message'],
        ]);

        return redirect(route('posts.show', compact('post')));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ChirpRequest $request, Post $post, Chirp $chirp): RedirectResponse
    {
        Gate::authorize('update', $chirp);

        $validated = $request->validated();
        $validated['post_id'] = $post->id;
        $chirp->update($validated);
        return redirect(route('posts.show', compact('post')));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Chirp $chirp): RedirectResponse
    {
        Gate::authorize('delete', $chirp);
        $chirp->delete();
        return redirect(route('posts.show', compact('post')));
    }
}
