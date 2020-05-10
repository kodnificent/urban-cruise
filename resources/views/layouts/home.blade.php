@extends('master')

@section('title', settings('site_name'))

@section('content')
    <home-layout :data='@json($data)'></home-layout>
@endsection
