@php
    $title     = (isset($title) ? $title : false);
    $className = (isset($class) ? $class : false);
    $content   = (isset($content) ? $content : false);
@endphp

<div class="page__header container mb-12 p-3 sm:p-8 {{ $className }} {{ $index % 2 == 0 ? 'flex-row-reverse' : '' }}">
    @if (isset($image))
        <div class="page__header-image hidden lg:block mb-12">
            <img src="{{ $image }}" alt="{{ $title }} Image">
            <span class="hidden sr-only">{{ $title }}</span>
        </div>
    @endif

    @if (isset($title) || isset($content))
        <div class="page__header-content mb-12 prose">
            @if (isset($title))
                <h2>{{ $title }}</h2>
            @endif

            @if (isset($content))
                {!! $content !!}
            @endif
        </div>
    @endif
</div>
