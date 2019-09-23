@php
    $launched = ($project->launched ? 'Launched in ' . date('F Y', $project->launched) : false);
@endphp

<div class="w-full sm:w-1/2 px-3">
    <div class="card">
        <a
            href="{{ $project->getUrl() }}"
            title="Visit - {{ $project->title }}"
        >
            <div class="card__body">
                <h3 class="card__title mb-0">
                   {{ $project->title }}
                </h3>
                <p class="text-secondary text-xs m-0">{{ $launched }}</p>
            </div>
        </a>
    </div>
</div>
