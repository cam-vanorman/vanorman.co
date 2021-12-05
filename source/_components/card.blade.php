<div class="project card__block">
    <div class="card">
        <a
            href="{{ $url }}"
            title="{{ $title }}"
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