@php
    $title    = ($page->title ?? false);
    $image    = ($page->image ?? false);
    $slug     = ($page->slug ? '_projects.' . $page->slug : false);
    $url      = ($page->url ? strtok($page->url, '?'): false);
    $content  = ($page->content ?? false);
    $tags     = ($page->tags() ?? false);
    $brand    = ($page->brand ? 'style="background-color: #' . $page->brand . ' !important;"' : false);
    $launched = ($page->launched ? date('F Y', $page->launched) : false);
@endphp

@extends('_layouts.master')

@push('meta')
    @include('_components.meta', [
        'title' => $page->title,
        'type'  => 'article',
        'url' => $page->getUrl(),
        'description' => $page->body
    ])
@endpush

@section('body')
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">{{ $title }}</h1>
            <h4 class="page__hero-subtitle">Launched {{ $launched }}</h4>
            @if ($url)
            <a href="{{ $page->url }}" rel="nofollow noopener" target="_blank" class="btn btn--primary text-center text-xs mx-auto">{{ $url }}</a>
            @endif
        </div>
    </div>
    <div class="md:-mt-16 p-0 page__content rounded">
        @if ($image)
        <a href="{{ $page->url }}" class="block" rel="nofollow noopener" target="_blank">
            <img class="mx-auto mb-2 rounded" src="{{ $image }}" alt="{{ $title }} cover image">
        </a>
        @endif
    </div>
    <div class="md:flex bg-white rounded shadow-lg page__content">
        <div class="page__content-body w-full md:w-2/3">
            @include($slug)
        </div>
        <div class="page__content-sidebar w-full md:w-1/3">
            {{-- Logo --}}
            @if ($page->cover)
            <div class="card" {!! $brand !!}>
                <div class="card__body">
                    <img src="{{ $page->cover }}" alt="{{ $title }} Logo Image" class="w-full max-w-sm mx-auto">
                </div>
            </div>
            @endif

            {{-- Built with --}}
            @if ($tags)
            <h3>Built With</h3>
            @include('_components.tags', ['tags' => $tags])
            @endif
        </div>
    </div>

    <nav class="text-center container md:flex md:justify-between md:items-center md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a class="text-lg p-3 btn btn--primary" href="{{ $next->getUrl() }}" title="Older Project: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a class="text-lg p-3 btn btn--primary" href="{{ $previous->getUrl() }}" title="Newer Project: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
