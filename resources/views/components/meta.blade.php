
@if (! $res['is_shell'])
    @section('metas')
        <title>{{ $res['meta']['seo_title'] }}</title>
        <meta name="description" content="{{ $res['meta']['seo_description'] }}">
        <meta name="canonical" content="{{ $res['meta']['seo_canonical'] }}">
        @isset ($res['meta']['og'])
            <meta property="og:title" content="{{ $res['meta']['og']['title'] }}">
            <meta property="og:image" content="{{ $res['meta']['og']['image'] }}">
            <meta property="og:description" content="{{ $res['meta']['og']['description'] }}">
            <meta property="og:url" content="{{ $res['meta']['og']['url'] }}">
            <meta name="twitter:card" content="summary_large_image">
        @endisset
    @endsection
@endif
