@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <list-layout :res='@json($res)'></list-layout>
@endsection
