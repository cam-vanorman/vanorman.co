---
pagination:
    collection: projects
    perPage: 10
---
@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Portfolio Website for {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Projects developed by {{ $page->siteName }}" />
@endpush

@section('body')
    <h1 class="my-8 text-center">Projects</h1>
    
    <div class="cards my-4 justify-around"> 
        @foreach ($pagination->items as $project)
            @include('_components.project-preview-inline')
        @endforeach
    </div>

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}"
                    title="Previous Page"
                    class="bg-grey-lighter hover:bg-grey-light rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class="bg-grey-lighter hover:bg-grey-light text-blue-darker rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-blue-dark' : '' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}"
                    title="Next Page"
                    class="bg-grey-lighter hover:bg-grey-light rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif
@stop
