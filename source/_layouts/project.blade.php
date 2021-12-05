@php
    $title            = ($page->title ?? false);
    $image            = ($page->image ?? false);
    $slug             = ($page->slug ? '_projects.' . $page->slug : false);
    $url              = ($page->url ? strtok($page->url, '?'): false);
    $body             = ($page->body ?? false);
    $builtWith        = (explode(',', $page->builtWith) ?? false);
    $brand            = ($page->brand ? 'style="background-color: #' . $page->brand . ' !important;"' : false);
    $launched         = ($page->launched ?: false);
    $metaDescription  = ($page->metaDescription ?? false);

    // dump($page);
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
                    {{ $url }} <i class="inline-block w-4" data-feather="external-link"></i>
                </a>
            @endif
        </div>
    </div>

    <div class="md:-mt-16 max-w-screen-lg mx-auto p-0 mb-12 rounded bg-white shadow-2xl">
        @if ($image)
            <a href="{{ $page->url }}" class="block" rel="nofollow noopener" target="_blank">
                <img class="w-full p-0 rounded" src="{{ $image }}" alt="{{ $title }} cover image">
            </a>
        @endif
    </div>

    <div class="md:flex max-w-screen-lg mx-auto items-center">
        <div class="w-full mb-6 md:w-2/3 sm:rounded shadow-2xl px-4 bg-white">
            <div class="prose p-3 md:p-8">
                @include($slug)
            </div>
        </div>
        <div class="w-full md:w-1/3 px-4">
            {{-- Logo --}}
            @if ($page->cover)
                <div class="md:-ml-8 p-3 bg-white rounded mb-6 shadow-2xl" {!! $brand !!}>
                    <img src="{{ $page->cover }}" alt="{{ $title }} Logo Image" style="{{ $page->coverWidth }}" class="w-full sm:w-48 mx-auto">
                </div>
            @endif

            <div class="prose sm:rounded shadow-2xl bg-tertiary text-white p-3 md:p-8 border border-secondary md:-ml-8">
                @if ($launched)
                    {{-- Project Launch --}}
                    <h3>Launched</h3>
                    <p class="tag m-0"><i class="inline-block w-4" data-feather="send"></i> {{ $launched }}</p>
                @endif

                {{-- Built with --}}
                @if ($builtWith)
                    <h3>Built With</h3>
                    <x-tags :tags="$builtWith" />
                @endif
            </div>
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
