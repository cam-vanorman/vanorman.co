@php
    $title      = ($project->title ?? $project->title);
    $projectUrl = ($project->getUrl() ?? $project->getUrl());
    $slug       = ($project->slug ?? $project->slug);
    $brand      = ($project->brand ? 'brand-' . $slug : '');
    $brandColor = ($project->brand ?? $project->brand);
    $hover      = ($project->brand && $project->cover ? 'card__hover' : '');
    $cover      = ($project->cover ?? $project->cover);
    $launched   = ($project->launched ? date('F Y', $project->launched) : false);
    $coverWidth = ($project->coverWidth ?? $project->coverWidth);

@endphp

{{-- Brand styles --}}
@push('styles')
    <style>
        .brand-{{ $slug }} { background-color: #{{ $brandColor }}; }
        .brand-{{ $slug }} .card__img { max-width: {{ $coverWidth }}; }
    </style>
@endpush

<div class="project card__block {{ $class }}">
    <div class="card {{ $brand }} {!! $hover !!}">
        <a
            href="{{ $projectUrl }}"
            title="Visit - {{ $title }}"
            class="min-h-full"
        >
            @if ($cover)
                <img class="card__img w-full px-2 m-auto" src="{{ $cover }}" alt="{{ $title }} Image">
            @endif

            <div class="card__body {{ ($project->featured ? 'md:border-l-8 md:border-secondary' : '') }}">
                {{-- Title --}}
                <h3 class="card__title mb-0">
                    {{ $title }}
                </h3>

                {{-- Launched --}}
                @if($launched)
                <p class="text-xs m-0">{{ $launched }}</p>
                @endif
            </div>
        </a>
    </div>
</div>
