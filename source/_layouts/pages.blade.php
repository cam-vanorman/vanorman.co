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
    @php
        $collections = $page->collections->map(function ($collection) {
            return $collection->items;
        });
    @endphp

    @foreach($page->pageTemplateBlocks as $index => $fields)
        <x-block
            :fields="$fields"
            :collections="$collections"
            :index="$index"
        />
    @endforeach
@endsection
