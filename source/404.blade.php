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

    {{-- <div class="md:-mt-16 bg-gray-300 lg:p-8 mb-12 projects cards justify-start rounded shadow-lg page__content">
    </div> --}}

    <div class="page__hero shadow-2xl mt-12 md:mt-24 mb-12 md:mb-24">
        <div class="page__hero-wrap lg:p-8 md:text-left md:w-1/2 cards justify-start">
            <div class="mx-auto bg-transparent shadow-none">
                <img class="card__img rounded" src="{{ $page->site['404']}}" alt="404 Page not found">
            </div>
        </div>
        <div class="md:-mt-16 bg-white p-3 text-center lg:p-8 mb-12 rounded shadow-lg page__content md:w-1/2">
            <h2>Oh dear, what an embarassment this is.</h2>
            <p>Feel free to navigate back to the <a href="/">homepage</a>. Apologies for the inconvenience and have a wonderful rest of your day.</p>

             <a href="/" class="btn btn--primary block">Home</a>
        </div>
    </div>
@endsection
