@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title}} {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Who is {{ $page->siteName }}?" />
@endpush

@section('body')
    <div class="page__hero">
        <div class="w-full block text-center mb-5">
            <h4 class="text-secondary mt-0 mb-1">FOCUSED AND DYNAMIC</h4>
            <h1 class="leading-none page__hero-title mx-auto mb-0 mt-0">About Me</h1>
        </div>
    </div>
    <div class="md:-mt-20 p-0 page__content">
        @include('_components.page-header', ['slug' => '_pages.about', 'image' => getenv('SELFIE')])
    </div>
@endsection
