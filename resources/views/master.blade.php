<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @yield('metas')

        <link rel="preload" href="{{ mix('assets/css/vendor.css') }}" as="style">
        <link rel="preload" href="{{ mix('assets/css/app.css') }}" as="style">
        <link rel="preload" href="{{ mix('assets/js/app.js') }}" as="script">
        <link rel="preload" href="{{ mix('assets/js/vendor.js') }}" as="script">
        <link rel="preload" href="{{ mix('assets/js/manifest.js') }}" as="script">

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

            <!-- Google Ad sense -->
            <script data-ad-client="ca-pub-9135565255758714" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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

        @if (app()->environment('production'))
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        @endif

        <!-- stacked scripts -->
        @stack('scripts')
    </body>
</html>
