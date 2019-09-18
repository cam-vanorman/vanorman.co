<div class="w-full sm:w-1/2 px-3">
    <div class="card">
        <a
            href="{{ $project->getUrl() }}"
            title="Visit - {{ $project->title }}"
            class="text-black font-extrabold"
        >
            <div class="card__body">
                <h3 class="card__title">
                   {{ $project->title }}
                    <span class="mx-3">&RightArrow;</span>
                </h3>
            </div>
        </a>
    </div>
</div>
