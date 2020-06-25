@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <category-post-layout :server_res='@json($res)'></category-post-layout>
@endsection
