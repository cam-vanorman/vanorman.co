@php
    $title    = ($page->title ?? false);
    $image    = ($page->image ?? false);
    $slug     = ($page->slug ? '_projects.' . $page->slug : false);
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

@push('styles')
    <style>
        .brand-{{ $slug }} { background-color: #{{ $brandColor }}; }
        .brand-{{ $slug }} .card__img { max-width: {{ $coverWidth }}; }
    </style>
@endpush

@section('body')
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h4 class="page__hero-subtitle">{{ $launched }}</h4>
            <h1 class="page__hero-title">{{ $title }}</h1>
            <a href="{{ $page->url }}" rel="nofollow noopener" target="_blank" class="page__hero-link">Visit Live Site &RightArrow;</a>
        </div>
    </div>
    <div class="lg:-mt-16 bg-white p-0 rounded shadow-lg page__content">

        @if ($image)
        <a href="{{ $page->url }}" class="block" rel="nofollow noopener" target="_blank">
            <img class="mx-auto hidden sm:block mb-2 rounded-t" src="{{ $image }}" alt="{{ $title }} cover image">
        </a>
        @endif

        @if ($page->cover)
        <div class="cards">
            <a href="{{ $page->url }}" class="block" rel="nofollow noopener" target="_blank">
                <div class="card rounded-none sm:rounded sm:-mt-12" {!! $brand !!}>
                    <div class="card__body">
                        <img src="{{ $page->cover }}" style="max-width: {{ $page->coverWidth }};" alt="{{ $title }} Logo Image" class="w-full mx-auto">
                    </div>
                </div>
            </a>
        </div>
        @endif

        <div class="px-8 py-8 page__content-text">
            @include($slug)

            <h3 class="text-center">Built With</h3>
            @include('_components.tags', ['tags' => $tags])
        </div>
    </div>

    <nav class="flex justify-between text-center items-center container md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a class="text-lg p-3" href="{{ $next->getUrl() }}" title="Older Project: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a class="text-lg p-3" href="{{ $previous->getUrl() }}" title="Newer Project: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
