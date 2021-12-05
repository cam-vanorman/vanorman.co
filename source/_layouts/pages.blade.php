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
@endsection
