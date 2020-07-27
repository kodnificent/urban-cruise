@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <privacy-policy :server_res='@json($res)'></privacy-policy>
@endsection
