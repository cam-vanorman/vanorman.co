@extends('_layouts.master')

@section('body')
    <div class="block w-full p-5 mb-3">
        @include('_pages.index')
    </div>

    <div class="w-full p-5 mb-3">
        <div class="w-full">
            <h2>Projects</h2>
        </div>
        <div class="cards">
            @foreach ($projects as $project)        
                    @include('_components.project-preview-inline')
            @endforeach
        </div>
    </div>
@stop
