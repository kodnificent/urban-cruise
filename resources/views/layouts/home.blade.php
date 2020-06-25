@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <home-layout :server_res='@json($res)'></home-layout>
@endsection
