@extends('master')

@section('metas')
<title>Not Found</title>
<meta name="robots" content="noindex" />
@endsection

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center px-4 md:px-8 mx-auto container">
        <img class="mb-6" style="max-height: 400px;" src="{{ asset('imgs/notfound.svg') }}" alt="notfound" />

        <p class="mb-6 text-center">We can't seem to find the page you're looking for. It has either been moved or it never existed</p>

        <a class="button button--primary" href="/">Go back Home</a>
    </div>
@endsection
