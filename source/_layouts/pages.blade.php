@extends('_layouts.master')

@push('meta')
    @include('_components.meta', [
        'title' => $page->title,
        'type'  => 'article',
        'url' => $page->getUrl(),
        'description' => $page->body
    ])
@endpush

@section('body')

    {{-- Introduction --}}
    <div class="page__hero">
        <div class="page__hero-wrap max-w-2xl p-8 text-sm md:text-xl">
           <h1 class="page__hero-title mb-5">{{ $page->title }}</h1>
        </div>
    </div>

    <div class="md:-mt-20 bg-white px-8 mb-12 text-center rounded shadow-lg page__content">
        @yield('content')
    </div>
@endsection
