@extends('_layouts.master')

@section('body')
    <div class="block w-full p-5 mb-3">
        <div class="section__title">
            <h4>Focused and Dynamic</h4>
            <h2>About me</h2>
        </div>
        <div class="page__content">
            @include('_pages.index')
        </div>
    </div>

    <div class="w-full p-5 mb-3">
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
