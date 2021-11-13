@extends('_layouts.main')

@push('meta')
    <x-meta
        :page="$page"
        :title="$page->seo['title']"
        type="article"
        :url="$page->seo['canonical']"
        :description="$page->seo['description']"
        :image="($page->seo['image'] ? $page->seo['image'] : '')"
    />
@endpush

@section('body')
    @foreach($page->pageTemplateBlocks as $index => $fields)
        <x-block :fields="$fields" :index="$index" />
    @endforeach
    {{-- Introduction --}}
    {{-- <x-hero.page :title="$title" /> --}}
    {{-- <div class="page__hero shadow-2xl">
        <div class="page__hero-wrap max-w-2xl p-8 text-sm md:text-xl">
           <h1 class="page__hero-title mb-5">{{ $page->title }}</h1>
        </div>
    </div> --}}

    {{-- <div class="md:-mt-20 bg-white px-8 mb-12 text-center rounded shadow-2xl page__content">
        @yield('content')
    </div> --}}
@endsection
