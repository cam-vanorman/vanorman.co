@php
    $title   = ($page->title ?? false);
    $image   = ($page->image ?? false);
    $slug    = ($page->slug ? '_projects.' . $page->slug : false);
    $content = ($page->content ?? false);
    $tags    = ($page->tags() ?? false);
@endphp

@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    <div class="page__hero">
        <div class="w-full block text-center mb-5">
            <h1 class="leading-none page__hero-title mx-auto mb-5">{{ $title }}</h1>
            <a href="{{ $page->url }}" rel="nofollow noopener" target="_blank" class="inline-block hover:text-steel-blue">Visit Live Site &RightArrow;</a>
        </div>
    </div>
    <div class="md:-mt-20 bg-white p-0 rounded shadow-lg page__content">
        
        @if ($image)
            <a href="{{ $page->url }}" class="block" rel="nofollow noopener" target="_blank">
                <img class="mx-auto hidden rounded sm:block" src="{{ $image }}" alt="{{ $title }} cover image" class="mb-2">
            </a>
        @endif
        
        <div class="px-8 py-8 page__content-text">
            @include('_components.tags', ['tags' => $tags])

            @include($slug)
        </div>
    </div>

    <nav class="flex justify-between container md:text-base">
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
