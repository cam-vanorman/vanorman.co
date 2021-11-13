@extends('_layouts.main')

@push('meta')
    @include('_components.meta', [
        'title' => $page->title,
        'type'  => 'website',
        'url' => $page->getUrl(),
        'description' => $page->body
    ])
@endpush

@section('body')
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">{{  $page->title }}</h1>
            @include('_pages.projects')
        </div>
    </div>

    <div class="projects cards justify-center pt-10">
        @foreach ($projects as $project)
            @if($project->featured)
                @include('_components.project-card', ['project' => $project, 'class' => 'md:w-1/2'])
            @else
                @include('_components.project-card', ['project' => $project, 'class' => 'md:w-1/3'])
            @endif
        @endforeach
    </div>
@stop