@extends('_layouts.master')

@push('meta')
    @include('_components.meta', [
        'title' => $page->title,
        'type'  => 'website',
        'url' => $page->getUrl(),
        'description' => $page->body
    ])
@endpush

@section('body')
    {{-- Introduction --}}
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h1>{{ $pages->index->title }}</h1>
            @include('_pages.index')
        </div>
    </div>

    {{-- About --}}
    <div class="md:-mt-16 mb-12 p-0 page__content">
        <div class="page__header">
            <div class="page__header-image">
                <img src="{{ $pages->index->image }}" alt="Image of {{ $page->site['name'] }}">
                <span class="hidden sr-only">{{ $page->site['name'] }}</span>
            </div>
            <div class="page__header-content section__title text-center sm:text-left">
                <h2>{{ $pages->about->title }}</h2>
                @include('_pages.about')
            </div>
        </div>
    </div>

    {{-- Work --}}
    <div class="page__hero mb-12">
        <div class="page__hero-wrap md:p-8 md:text-left md:w-1/3 lg:w-1/4">
            <h2 class="page__hero-title md:text-left">{{ $pages->projects->title }}</h2>
            @include('_pages.projects')
        </div>
        <div class="md:-mt-16 bg-white p-8 mb-12 cards justify-around rounded shadow-lg page__content md:w-2/3 lg:w-3/4">
            @foreach ($projects as $project)
                    @include('_components.project-card', ['project' => $project])
            @endforeach
        </div>
    </div>

    {{-- Expertise --}}
    <div class="page__hero md:flex-row-reverse">
        <div class="page__hero-wrap md:p-8 md:text-left md:w-1/3 lg:w-1/4">
            <h2 class="page__hero-title md:text-left">{{ $pages->skills->title }}</h2>
            @include('_pages.skills')
        </div>
        <div class="md:-mt-16 bg-white p-8 mb-12 rounded shadow-lg page__content md:w-2/3 lg:w-3/4">
            @include('_components.skills', ['skill' => $skill])
        </div>
    </div>
@stop
