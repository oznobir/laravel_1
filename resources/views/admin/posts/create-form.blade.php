{{--@extends('layouts.layout', ['head_title' => 'Добавление нового юзеров'])--}}

{{--@section('title', 'Добавить юзера')--}}
{{--@section('content')--}}
<x-admin-layout>
    <x-slot name="head_title">
        Добавление новой статьи
    </x-slot>
    <x-slot name="title">
        <div class="flex lg:justify-center lg:col-start-2">
            Добавить статью
        </div>
    </x-slot>
    <main class="mt-6">
        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

            <form action="{{ route('admin.posts.store') }}"
                  method="post"
                  class="flex flex-col items-center gap-4 p-6 rounded-lg bg-white shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
            >
                @csrf
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
                    <input type="text" value="{{ old('title') }}"
                           name="title"
                           placeholder="Заголовок статьи"
                           class="flex w-full items-star gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                </label>
                <label class="w-full">
                    <input type="text" value="{{ old('preview') }}"
                           name="preview"
                           placeholder="Краткое описание статьи"
                           class="flex w-full items-star gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                </label>
                <label class="w-full">
                    <textarea type="text"
                           name="description"
                           placeholder="Текст статьи"
                           class="flex w-full items-star gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >{{ old('description') }}</textarea>
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
