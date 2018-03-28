@extends('layouts.app')


@section('content')

    <section id="container" class="">
        @include('layouts.header')
        @include('layouts.sidebar')

    </section>
    <div class="content">
        <div class="panel-body text-center">
            <canvas id="line" height="300" width="450"></canvas>
        </div>

    </div>

@endsection