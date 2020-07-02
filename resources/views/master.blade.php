<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- propeller ads -->
        <meta name="propeller" content="40f137d97b26f3c1b13be05a6a5973fe">

        @yield('metas')

        <link rel="preload" href="{{ mix('assets/css/vendor.css') }}" as="style">
        <link rel="preload" href="{{ mix('assets/css/app.css') }}" as="style">
        <link rel="preload" href="{{ mix('assets/css/app.js') }}" as="script">
        <link rel="preload" href="{{ mix('assets/css/vendor.js') }}" as="script">
        <link rel="preload" href="{{ mix('assets/css/manifest.js') }}" as="script">

        <link rel="stylesheet" href="{{ mix('assets/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">

        @if (app()->environment('production'))
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
        <script src="{{ mix('assets/js/manifest.js') }}"></script>
        <script src="{{ mix('assets/js/vendor.js') }}"></script>
        <script src="{{ mix('assets/js/app.js') }}"></script>

        <!-- stacked scripts -->
        @stack('scripts')
    </body>
</html>
