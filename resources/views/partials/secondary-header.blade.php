@component('partials.header')
    @slot('icon')
        back
    @endslot

    @slot('title')
        {{ $title }}
    @endslot
@endcomponent
