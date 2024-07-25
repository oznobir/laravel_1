@extends('layout', ['head_title' => 'Имена наших юзеров'])
@section('title', 'Имена юзеров')
@section('content')
    <main class="mt-6">
        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
           @include('menu')
            @foreach($names as $name)
                <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                    {{ $name->fullName }}
                </div>
            @endforeach
        </div>
    </main>
@endsection