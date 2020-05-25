@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <home-layout :res='@json($res)'></home-layout>
@endsection
