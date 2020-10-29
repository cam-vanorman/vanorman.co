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
    <div class="md:-mt-16 mb-12 p-0 page__content container">
        <div class="page__header">
            <div class="page__header-image">
                <img src="{{ $pages->index->image }}" alt="Image of {{ $page->site['name'] }}">
                <span class="hidden sr-only">{{ $page->site['name'] }}</span>
            </div>
            <div class="page__header-content section__title text-center md:text-left">
                <h2>{{ $pages->about->title }}</h2>
                @include('_pages.about')
            </div>
        </div>
    </div>

     {{-- DigitalOcean Dev Talk --}}
    <div class="page__hero mb-12 md:mb-24 flex-row-reverse">
        <div class="page__hero-wrap lg:p-8 md:text-left md:w-1/2">
            <h2 class="page__hero-title md:text-left">{{ $pages['digitalocean-dev-talk']->title }}</h2>
            @include('_pages.digitalocean-dev-talk')
        </div>
        <div class="md:-mt-16 bg-white lg:p-8 mb-12 cards justify-around rounded shadow-lg page__content md:w-1/2 video__embed h-64 md:h-half">
             @include('_components.youtube-embed', [
                'embed' => $pages['digitalocean-dev-talk']->embeddedMedia,
            ])
        </div>
    </div>

    {{-- Work --}}
    <div class="page__hero mb-12 md:mb-24">
        <div class="page__hero-wrap lg:p-8 md:text-left md:w-1/3 lg:w-1/4">
            <h2 class="page__hero-title md:text-left">{{ $pages->projects->title }}</h2>
            @include('_pages.projects')
        </div>
        <div class="md:-mt-16 bg-gray-300 lg:p-8 mb-12 projects cards justify-start rounded shadow-lg page__content md:w-2/3 lg:w-3/4">
            @foreach ($projects as $project)
                @if($project->featured)
                    @include('_components.project-card', ['project' => $project, 'class' => 'featured lg:w-1/2'])
                @endif
            @endforeach
            @foreach ($projects as $project)
                @if(!$project->featured)
                    @include('_components.project-card', ['project' => $project, 'class' => 'lg:w-1/4'])
                @endif
            @endforeach
        </div>
    </div>

    {{-- Expertise --}}
    <div class="page__hero mb-12 md:mb-24 md:flex-row-reverse">
        <div class="page__hero-wrap lg:p-8 md:text-left md:w-1/3 lg:w-1/4">
            <h2 class="page__hero-title md:text-left">{{ $pages->skills->title }}</h2>
            @include('_pages.skills')
        </div>
        <div class="md:-mt-16 bg-white lg:p-8 mb-12 rounded shadow-lg page__content md:w-2/3 lg:w-3/4 md:flex md:flex-wrap">
            @include('_components.skills', ['skill' => $skill])
        </div>
    </div>
@stop
