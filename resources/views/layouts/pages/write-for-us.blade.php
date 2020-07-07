@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <write-for-us :server_res='@json($res)'></write-for-us>
@endsection
