@php
    $title            = ($page->title ?? false);
    $image            = ($page->image ?? false);
    $slug             = ($page->slug ? '_projects.' . $page->slug : false);
    $url              = ($page->url ? strtok($page->url, '?'): false);
    $content          = ($page->content ?? false);
    $tags             = ($page->tags() ?? false);
    $brand            = ($page->brand ? 'style="background-color: #' . $page->brand . ' !important;"' : false);
    $launched         = ($page->launched ?? false);
    $metaDescription  = ($page->metaDescription ?? false);
@endphp

@extends('_layouts.main')

@push('meta')
    @include('_components.meta', [
        'title' => $title,
        'type'  => 'article',
        'image' => $image,
        'url' => $page->getUrl(),
        'description' => $metaDescription,
    ])
@endpush

@section('body')
    <div class="page__hero shadow-2xl">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">{{ $title }}</h1>
            @if ($url)
                <a
                    href="{{ $url }}"
                    rel="nofollow noopener"
                    target="_blank"
                    class="btn btn--primary text-center text-xs mx-auto"
                >
                    {{ $url }}
                </a>
            @endif
        </div>
    </div>

    {{-- <div class="md:-mt-16 page__content rounded bg-white shadow-2xl md:p-8">
        @if ($image)
        <a href="{{ $page->url }}" class="block" rel="nofollow noopener" target="_blank">
            <img class="mx-auto mb-2 rounded" src="{{ $image }}" alt="{{ $title }} cover image">
        </a>
        @endif
    </div> --}}
    <div class="md:flex bg-white rounded shadow-2xl page__content">
        <div class="page__content-body prose w-full md:w-2/3">
            <img class="mx-auto mb-2 rounded" src="{{ $image }}" alt="{{ $title }} cover image">
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

            {{-- Project Launch --}}
            <h3>Launched</h3>
            <p class="tag m-0">{{ $launched }}</p>

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
                <a class="text-xs btn btn--primary" href="{{ $next->getUrl() }}" title="Older Project: {{ $next->title }}">
                    <i class="inline-block w-4" data-feather="arrow-left"></i> {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a class="text-xs btn btn--primary" href="{{ $previous->getUrl() }}" title="Newer Project: {{ $previous->title }}">
                    {{ $previous->title }} <i class="inline-block w-4" data-feather="arrow-right"></i>
                </a>
            @endif
        </div>
    </nav>
@endsection
