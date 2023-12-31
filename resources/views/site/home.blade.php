@extends('site.master.master')

@section('content')
    @if ($page->hero_text)
        @include('site.partials.hero')
    @endif
    @if ($page->benefits_text)
        @include('site.partials.benefits')
    @endif
    @if ($page->features || $page->headline)
        @include('site.partials.features')
    @endif
    @if ($page->tour)
        @include('site.partials.tour')
    @endif
    @if ($page->map)
        @include('site.partials.map')
    @endif
    @if ($page->conditions)
        @include('site.partials.conditions')
    @endif
    @if ($page->progress)
        @include('site.partials.progress')
    @endif
@endsection
