@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <about-us :server_res='@json($res)'></about-us>
@endsection
