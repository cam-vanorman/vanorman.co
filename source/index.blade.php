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

@stop
