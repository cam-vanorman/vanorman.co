@php
    $title      = ($title ?? $title);
    $slug       = ($slug ?: $slug);
    $projectUrl = ($slug ? "/project/" . $slug : $projectUrl);
    $brand      = ($slug ? 'brand-' . $slug : '');
    $brandColor = ($brandColor ?? $brandColor);
    $hover      = ($brand && $cover ? 'card__hover' : '');
    $cover      = ($cover ?: $cover);
    $featured   = ($featured ?: $featured);
    $launched   = ($launched ? date('F Y', $launched) : false);
    $coverWidth = ($coverWidth ?: $coverWidth);
@endphp

{{-- Brand styles --}}
@push('styles')
    <style>
        .brand-{{ $slug }} { background-color: #{{ $brandColor }}; }
        .brand-{{ $slug }} .card__img { max-width: {{ $coverWidth }}; }
    </style>
@endpush

<div class="project card__block">
    <div class="card {{ $brand }} {!! $hover !!}">
        <a
            href="{{ $projectUrl }}"
            title="Visit - {{ $title }}"
            class="min-h-full"
        >
            @if ($cover)
                <img class="card__img w-full px-2 m-auto" src="{{ $cover }}" alt="{{ $title }} Image">
            @endif

            <div class="card__body {{ ($featured ? 'md:border-l-8 md:border-secondary' : '') }}">
                {{-- Title --}}
                <h3 class="card__title">
                    {{ $title }}
                </h3>

                {{-- Launched --}}
                @if($launched)
                    <p class="card__body--text">{{ $launched }}</p>
                @endif
            </div>
        </a>
    </div>
</div>
