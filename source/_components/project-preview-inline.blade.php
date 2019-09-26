@php
    $launched = ($project->launched ? date('F Y', $project->launched) : false);
    $brand    = ($project->brand ? 'style="background-color: #' . $project->brand . ' !important;"' : false);
    $hover    = ($project->brand && $project->cover ? ' card__hover' : false);
@endphp

<div class="w-full sm:w-1/2 px-3">
    <div class="card{!! $hover !!}" {!! $brand !!}>
        <a
            href="{{ $project->getUrl() }}"
            title="Visit - {{ $project->title }}"
        >
            @if ($project->cover)
                <img class="card__img w-full px-2 m-auto" style="max-width: {{ $project->coverWidth }};" src="{{ $project->cover }}" alt="{{ $project->title }} Image">
            @endif

            <div class="card__body">
                <h3 class="card__title mb-0">
                   {{ $project->title }}
                </h3>
                <p class="text-xs m-0">{{ $launched }}</p>
            </div>
        </a>
    </div>
</div>
