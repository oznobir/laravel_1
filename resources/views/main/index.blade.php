{{--@extends('layouts.layout', ['head_title' => 'Laravel'])--}}
{{--@section('title', 'Ларавел')--}}
{{--@section('content')--}}
<x-main-layout>
    <x-slot name="head_title">
        Laravel
    </x-slot>
    <x-slot name="title">
        <div class="flex lg:justify-center lg:col-start-2">
            Ларавел
        </div>
    </x-slot>
    <main class="mt-6">
        <x-footer>
            <x-slot name="foot_title">
                Laravel v
            </x-slot>
            <div>
                @include('main.menu')
            </div>
        </x-footer>
        {{--        @component('components.footer', ['foot_title' => 'Laravel v'])--}}
        {{--            <div>--}}
        {{--                @include('main.menu')--}}
        {{--            </div>--}}
        {{--        @endcomponent--}}
    </main>
</x-main-layout>
{{--@endsection--}}