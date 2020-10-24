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
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">{{  $page->title }}</h1>
            @include('_pages.projects')
        </div>
    </div>

    <div class="projects cards justify-center pt-10">
        @foreach ($projects as $project)
            @include('_components.project-card', ['project' => $project])
        @endforeach
    </div>
@stop