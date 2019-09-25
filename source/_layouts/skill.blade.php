@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')

    <div class="page__hero">
        <div class="page__hero-wrap">
          <h1 class="page__hero-title mb-5">{{ $page->title }}</h1>
        </div>
    </div>

    <div class="md:-mt-20 bg-white px-8 mb-12 text-center rounded shadow-lg page__content">
        @yield('content')
    </div>
@endsection
