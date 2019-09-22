@php
    $title   = ($page->title ?? false);
    $image   = ($page->image ?? false);
    $slug    = ($page->slug ? '_projects.' . $page->slug : false);
    $content = ($page->content ?? false);
@endphp

@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    <div class="page__content">
        <div class="block w-full p-5 mb-3">
            <div class="section__title">
                <h1 class="leading-none">{{ $title }}</h1>
            </div>
        </div>
        
        @if ($image)
            <img class="hidden sm:block" src="{{ $image }}" alt="{{ $title }} cover image" class="mb-2">
        @endif
        
        @include($slug)

        <div class="block text-center my-8">
            <a href="{{ $page->url }}" rel="nofollow noopener" target="_blank" class="block btn btn--primary">Visit Live Site</a>
        </div>
    </div>
{{-- 
    <nav class="flex justify-between md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a class="text-lg" href="{{ $next->getUrl() }}" title="Older Project: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a class="text-lg" href="{{ $previous->getUrl() }}" title="Newer Project: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav> --}}
@endsection
