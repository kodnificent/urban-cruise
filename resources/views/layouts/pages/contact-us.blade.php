@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <contact-us :server_res='@json($res)'></contact-us>
@endsection
