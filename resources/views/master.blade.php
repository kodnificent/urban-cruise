<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @yield('metas')

        <link rel="preload" href="{{ asset('css/vendor.css') }}" as="style">
        <link rel="preload" href="{{ asset('css/app.css') }}" as="style">

        <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @if (env('production'))
            <script data-ad-client="ca-pub-9135565255758714" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170743507-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-170743507-1');
            </script>
        @endif
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <!-- scripts -->
        <script src="{{ asset('js/manifest.js') }}"></script>
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        @stack('scripts')
    </body>
</html>
