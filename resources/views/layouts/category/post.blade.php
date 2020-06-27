@extends('master')

@component('components.meta', compact('res'))
@endcomponent

@section('content')
    <category-post-layout :server_res='@json($res)'></category-post-layout>
@endsection

@push('scripts')
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush
