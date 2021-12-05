@php
    if (!$project) {
        return;
    }

    $title      = ($project->title ?? $project->title);
    $slug       = ($project->slug ?: $project->slug);
    $projectUrl = ($project->slug ? "/project/" . $slug : $project->projectUrl);
    $brand      = ($project->slug ? 'brand-' . $project->slug : '');
    $brandColor = ($project->brandColor ?? $project->brandColor);
    $hover      = ($project->brand && $project->cover ? 'card__hover' : '');
    $cover      = ($project->cover ?: $project->cover);
    $featured   = ($project->featured ?: $project->featured);
    $launched   = ($project->launched ? date('F Y', $project->launched) : false);
    $coverWidth = ($project->coverWidth ?: $project->coverWidth);
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
