@php
    $className = (isset($class) ? $class : false);
    $content   = (isset($slug) ? $slug : false);
@endphp

<div class="page__header {{ $className }}">
    <div class="page__header-content">
        @if ($title)
            <h1>{{ $title }}</h1>
        @endif

        @if ($content)
            @include($content)
        @endif
    </div>

    @if ($image)
    <div class="page__header-image hidden lg:block">
            <img src="{{ $image }}" alt="{{ $title }} Image">
            <span class="hidden sr-only">{{ $title }}</span>
    </div>
    @endif

</div>