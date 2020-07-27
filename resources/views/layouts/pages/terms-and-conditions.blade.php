@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <terms-and-conditions :server_res='@json($res)'></terms-and-conditions>
@endsection
