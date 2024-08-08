{{--@extends('layouts.layout', ['head_title' => 'Изменение данных юзера'])--}}

{{--@section('title', 'Изменение юзера')--}}
{{--@section('content')--}}
<x-admin-layout>
    <x-slot name="head_title">
        Изменение статьи
    </x-slot>
    <x-slot name="title">
        <div class="flex lg:justify-center lg:col-start-2">
            Изменение статьи: {{ $post->title }}
        </div>
    </x-slot>
    <main class="mt-6">
        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
            <form action="{{ route('admin.posts.update', $post) }}"
                  method="post"
                  class="flex flex-col items-center gap-4 p-6 rounded-lg bg-white shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
            >
                @csrf
                @method('patch')
                @if ($errors->any())
                    <div class="">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label class="w-full">
                    <input type="text"
                           value="{{ old('title', $post->title) }}"
                           name="title"
                           placeholder="Заголовок статьи"
                           class="flex w-full items-star gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                </label>
                <label class="w-full">
                    <input type="text"
                           value="{{ old('preview', $post->preview) }}"
                           name="preview"
                           placeholder="Краткое описание статьи"
                           class="flex w-full items-star gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                </label>
                <label class="w-full">
                     <textarea
                             class="flex w-full items-star gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                             placeholder="Текст статьи"
                             name="description"
                     >{{ old('description', $post->description) }}</textarea>
                </label>
                <input type="submit"
                       value="Сохранить"
                       class="flex items-center gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                >
            </form>
            @include('admin.menu')
        </div>

    </main>
</x-admin-layout>
{{--@endsection--}}
