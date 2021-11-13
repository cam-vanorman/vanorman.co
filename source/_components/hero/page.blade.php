@if ($content)
    <div class="page__hero prose mb-12 md:mb-24">
        <div class="page__hero-wrap">
            <h1 class="page__hero-title">{{ $title }}</h1>
            {!! $content !!}
        </div>
    </div>
@endif