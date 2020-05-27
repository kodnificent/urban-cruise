@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <category-show-layout :server_res='@json($res)'></category-show-layout>
@endsection
