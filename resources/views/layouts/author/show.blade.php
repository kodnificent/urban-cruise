@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <author-show-layout :server_res='@json($res)'></author-show-layout>
@endsection
