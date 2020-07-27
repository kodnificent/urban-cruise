@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <disclaimer :server_res='@json($res)'></disclaimer>
@endsection
