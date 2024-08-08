{{--@extends('layouts.layout', ['head_title' => 'Laravel'])--}}
{{--@section('title', 'Ларавел')--}}
{{--@section('content')--}}
<x-admin-layout>
    <x-slot name="head_title">
        Управление сайтом
    </x-slot>
    <x-slot name="title">
        <div class="flex lg:justify-center lg:col-start-2">
            Управление сайтом
        </div>
    </x-slot>
    <main class="mt-6">
        <x-footer>
            <x-slot name="foot_title">
                Laravel v
            </x-slot>
            <div>
                @include('admin.menu')
            </div>
        </x-footer>
        {{--        @component('components.footer', ['foot_title' => 'Laravel v'])--}}
        {{--            <div>--}}
        {{--                @include('admin.menu')--}}
        {{--            </div>--}}
        {{--        @endcomponent--}}
    </main>
</x-admin-layout>
{{--@endsection--}}