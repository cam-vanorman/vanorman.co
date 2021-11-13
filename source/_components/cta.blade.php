<div class="mx-auto max-w-md card">
    <div class="card__body">
        <h3 class="card__title">
            {{ $title }}
        </h3>
        <p class="card__text">
            {!! $body !!}
        </p>
        @if (isset($actions) && !empty($actions) && $actions)
            <div class="card__actions">
                @foreach ($actions as $action)
                    @dump($action)
                    {{-- <a href="{{ $action['url'] }}" class="btn btn--primary">
                        {{ $action['label'] }}
                    </a> --}}
                @endforeach
            </div>
        @endif
    </div>
</div>