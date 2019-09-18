@extends('_layouts.master')

@section('body')
    <div class="block w-full p-5 mb-3">
        <div class="w-full">
            <h2 class="mb-8 text-center">About me</h2>
        </div>
        <div class="page__content">
            @include('_pages.index')
        </div>
    </div>

    <div class="w-full p-5 mb-3">
        <div class="w-full">
            <h2 class="mb-8 text-center">Projects</h2>
        </div>
        <div class="cards justify-around">
            @foreach ($projects as $project)        
                    @include('_components.project-preview-inline')
            @endforeach
        </div>
    </div>
@stop
