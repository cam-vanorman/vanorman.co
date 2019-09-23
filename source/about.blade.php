@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title}} {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Who is {{ $page->siteName }}?" />
@endpush

@section('body')
    <div class="page__hero">
        <div class="page__hero-wrap">
            <h4 class="page__hero-subtitle">Focused and Dynamic</h4>
            <h1 class="page__hero-title">About Me</h1>
        </div>
    </div>
    <div class="md:-mt-20 p-0 page__content">
        @include('_components.page-header', ['slug' => '_pages.about', 'image' => getenv('SELFIE')])
    </div>
@endsection
