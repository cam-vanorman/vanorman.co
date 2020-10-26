@extends('_layouts.master')

@section('body')
    {{-- Introduction --}}
    <div class="page__hero">
        <div class="page__hero-wrap">
            @include('_pages.index')
        </div>
    </div>

    {{-- About --}}
    <div class="md:-mt-16 pb-12 page__content">
        <div class="page__header">
            <div class="page__header-image">
                <img src="{{ $pages->index->image }}" alt="Image of {{ $page->site['name'] }}">
                <span class="hidden sr-only">{{ $page->site['name'] }}</span>
            </div>
            <div class="page__header-content text-center sm:text-left">
                <h2>About Me</h2>
                @include('_pages.about')
            </div>

        </div>
    </div>

    {{-- Work --}}
    <div class="page__content bg-white rounded shadow-lg text-center">
        <div class="section__title max-w-2xl container text-tertiary mb-6">
            <h2>My Recent Work</h2>

            @include('_pages.projects')
        </div>

        <div class="cards justify-around">
            @foreach ($projects as $project)
                    @include('_components.project-card', ['project' => $project])
            @endforeach
        </div>
    </div>

    {{-- Expertise --}}
    <div class="page__hero h-64 md:h-35vh">
        <div class="page__hero-wrap max-w-2xl p-4 mb-0 md:mb-12 md:p-8 md:text-xl">
            <h2 class="page__hero-title">Expertise</h2>
            @include('_pages.skills')
        </div>
    </div>
    <div class="md:-mt-16 bg-white p-8 mb-12 rounded shadow-lg page__content">
        @include('_components.skills', ['skill' => $skill])
    </div>
@stop
