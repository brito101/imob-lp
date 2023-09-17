@extends('site.master.master')

@section('content')
    @if ($page->hero_text)
        @include('site.partials.hero')
    @endif
    @if ($page->benefits_text)
        @include('site.partials.benefits')
    @endif
@endsection
