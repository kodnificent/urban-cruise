@extends('master')

@if (! $res['is_skeleton'])
    @section('metas')
        <title>{{ $res['meta']['title'] }}</title>
    @endsection
@endif

@section('content')
    <home-layout :res='@json($res)'></home-layout>
@endsection
