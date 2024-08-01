@extends('layouts.layout', ['head_title' => 'Laravel'])
@section('title', 'Ларавел')
@section('content')
    <main class="mt-6">
        @component('main.footer', ['foot_title' => 'Laravel v'])
            <div>
                @include('main.menu')
            </div>
        @endcomponent
    </main>
@endsection