@extends('partials.header')

@section('icon')
    toggle
@endsection

@section('title')
    {{ $title }}
@endsection

@section('after')
    <nav class="header__navbar navbar">

    </nav>

    {{ $slot }}
@endsection
