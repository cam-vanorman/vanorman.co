@extends('_layouts.master')

@section('body')
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h4 class="page__hero-subtitle">{{ $page->siteRole }}</h4>
            <h1 class="page__hero-title">{{ $page->siteName }}</h1>
        </div>
    </div>
    <div class="md:-mt-20 p-0 page__content">
        <div class="page__header">
            <div class="page__header-content text-center sm:text-left">
                <h4 class="mb-1 mt-0 text-secondary">Focused and Dynamic</h4>
                <h2 class="m-0">About Me</h2>
                @include('_pages.index')
            </div>
          
            <div class="page__header-image hidden lg:block">
                <img src="{{ getenv('SELFIE') }}" alt="Image of {{ $page->siteName }}">
                <h3 class="hidden sr-only">{{ $title }}</h3>
            </div>
        </div>
    </div>
    <div class="block w-full container p-5 mb-3">
        <div class="section__title">
            <h4>Experience Matters</h4>
            <h2>My Recent Work</h2>
        </div>
        <div class="cards justify-around">
            @foreach ($projects as $project)        
                    @include('_components.project-preview-inline')
            @endforeach
        </div>
    </div>
@stop
