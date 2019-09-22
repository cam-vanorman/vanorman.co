@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')

    <h1 class="page__title">{{ $page->title }}</h1>

    <div class="page__content" v-pre>
        @yield('content')
    </div>
@endsection
