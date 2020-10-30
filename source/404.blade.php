@extends('_layouts.master')

@push('meta')
    @include('_components.meta', [
        'title' => '404 Page Not Found',
        'type'  => 'article',
        'url' => '',
        'description' => 'The requested page was not found'
    ])
@endpush

@section('body')
    <div class="page__hero shadow-2xl">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">404 Page not Found</h1>
            <p>The Page or Document you were looking for was not found.</p>
        </div>
    </div>

    <div class="md:-mt-16 mb-12 p-0 page__content container">
        <div class="page__header">
            <div class="page__header-image">
                <img class="card__img rounded" src="{{ $content['404']->image }}" alt="404 Page not found GIF">
            </div>
            <div class="md:-ml-3 page__header-content section__title text-center">
                @include('_content.404')

                <a href="/" class="btn btn--primary block"><i class="inline w-4" data-feather="arrow-left"></i> Home</a>
            </div>
        </div>
    </div>
@endsection
