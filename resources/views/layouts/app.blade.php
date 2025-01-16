@extends('adminlte::page')

@section('title', config('app.name', 'Laravel'))

@section('content_header')
    @isset($header)
        <h1>{{ $header }}</h1>
    @endisset
@stop

@section('content')
    @yield('content')
@stop

@push('css')
    <style>
    </style>
@endpush

@push('js')
    <script>
    </script>
@endpush
