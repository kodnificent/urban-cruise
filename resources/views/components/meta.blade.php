
@if (! $res['is_shell'])
    @section('metas')
        <title>{{ $res['meta']['seo_title'] }}</title>
        <meta name="description" content="{{ $res['meta']['seo_description'] }}">
        <meta name="canonical" content="{{ $res['meta']['seo_canonical'] }}">
    @endsection
@endif
