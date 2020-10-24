@extends('_layouts.master')

@push('meta')
    @include('_components.meta', [
        'title' => 'My Recent Work',
        'type'  => 'website',
        'url' => $page->getUrl(),
        'description' => $page->body
    ])
@endpush

@section('body')
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">My Recent Work</h1>
            @include('_pages.projects')
        </div>
    </div>

    <div class="projects cards justify-center p-0">
        @foreach ($projects as $project)
            @include('_components.project-card', ['project' => $project])
        @endforeach
    </div>
@stop
