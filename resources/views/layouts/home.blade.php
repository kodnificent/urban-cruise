@extends('master')

@section('meta')
    <meta-component :meta='@json($meta ?? '')'>
    </meta-component>
@endsection

@section('content')
    <home-layout :data='@json($data ?? '')'></home-layout>
@endsection
