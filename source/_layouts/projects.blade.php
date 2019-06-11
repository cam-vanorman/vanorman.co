@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')
    
    <h1 class="leading-none my-8">{{ $page->title }}</h1>
    
    @if ($page->image)
        <img src="{{ $page->image }}" alt="{{ $page->title }} cover image" class="mb-2">
    @endif

    <div class="my-8 pb-4" v-pre>
        @yield('content')

        <div class="block text-center my-8">
            <a href="{{ $page->url }}" rel="nofollow noopener" target="_blank" class="btn btn--primary">Visit Live Site</a>
        </div>
    </div>

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
    </nav>
@endsection
