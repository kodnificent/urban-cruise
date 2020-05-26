@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <category-show-layout :res='@json($res)'></category-show-layout>
@endsection
