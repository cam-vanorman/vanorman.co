@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title}} {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Who is {{ $page->siteName }}?" />
@endpush

@section('body')
  <div class="page__content">
    @include('_components.page-header', ['title' => 'About Me', 'slug' => '_pages.about', 'image' => getenv('SELFIE')])
  </div>
@endsection
