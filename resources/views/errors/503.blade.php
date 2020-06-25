@extends('master')

@section('metas')
<title>Server Error</title>
<meta name="robots" content="noindex" />
@endsection

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center px-4 md:px-8 mx-auto container">
        <img class="mb-6" style="max-height: 400px;" src="{{ asset('imgs/server-error.svg') }}" alt="server error" />

        <p class="mb-6 text-center">
            A server error has occured while fetching this page. Please try later, we are working on it.
        </p>

        <a class="button button--primary" href="/">Go back Home</a>
    </div>
@endsection
