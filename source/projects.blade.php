@extends('_layouts.master')

@push('meta')
    @include('_components.meta', [
        'title' => $pages->projects->title,
        'type'  => 'website',
        'url' => $page->getUrl(),
        'description' => $page->body
    ])
@endpush

@section('body')
    <div class="page__hero mb-12 md:mb-24">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">{{ $pages->projects->title }}</h1>
            @include('_pages.projects')
        </div>
    </div>

    {{-- Featured --}}
    <div class="page__hero mb-12 md:mb-24">
        <div class="page__hero-wrap md:p-8 md:text-left md:w-1/3 lg:w-1/4">
            <h2 class="page__hero-title md:text-left">Featured Projects</h2>
            @include('_content.featured-projects')
        </div>
        <div class="md:-mt-16 bg-gray-300 md:p-8 mb-12 projects cards justify-around rounded shadow-2xl page__content md:w-2/3 lg:w-3/4">
            @foreach($projects as $project)
                @if($project->featured)
                    @include('_components.project-card', ['project' => $project, 'class' => 'featured lg:w-1/2'])
                @endif
            @endforeach
        </div>
    </div>

    {{-- Remaining Projects --}}
    <div class="projects cards justify-center p-0 mx-auto container">
        @foreach ($projects as $project)
            @if(!$project->featured)
                @include('_components.project-card', ['project' => $project, 'class' => 'lg:w-1/3'])
            @endif
        @endforeach
    </div>
@stop
