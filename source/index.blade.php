@extends('_layouts.master')

@section('body')
    {{-- Introduction --}}
    <div class="page__hero">
        <div class="page__hero-wrap max-w-lg p-8 text-sm md:text-xl">
            @include('_pages.index')
        </div>
    </div>

    {{-- About --}}
    <div class="md:-mt-16 mb-12 p-0 page__content">
        <div class="page__header">
            <div class="page__header-content text-center sm:text-left">
                <h2 class="m-0">About Me</h2>
                @include('_pages.about')
            </div>
          
            <div class="page__header-image hidden lg:block">
                <img src="{{ $pages->index->image }}" alt="Image of {{ $page->siteName }}">
                <span class="hidden sr-only">{{ $page->siteName }}</span>
            </div>
        </div>
    </div>
    
    {{-- Work --}}
    <div class="mb-12 text-center">
        <div class="section__title max-w-lg container text-tertiary mb-6">
            <h2>My Recent Work</h2>

            @include('_pages.projects')
        </div>
        <div class="cards justify-around container p-0">
            @foreach ($projects as $project)
                    @include('_components.project-preview-inline', ['project' => $project])
            @endforeach
        </div>
    </div>
    
    {{-- Skills --}}
    <div class="page__hero h-24 md:h-48">
        <div class="page__hero-wrap max-w-lg p-4 mb-0 md:mb-12 md:p-8 text-xl">
            <h2 class="page__hero-title mb-0">Skills</h2>
        </div>
    </div>
    <div class="md:-mt-16 bg-white p-8 mb-12 rounded shadow-lg page__content">
        @include('_components.skills', ['skill' => $skill])
    </div>
@stop
