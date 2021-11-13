<div class="max-w-full bg-black {{ isset($blocks) && !empty($blocks) ? 'py-8' : ''}}">
    <div class="page__content items-center flex flex-wrap p-8 {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
        <div
            class="
                {{
                    isset($blocks) && !empty($blocks) ? 'md:w-1/3 z-10 bg-white shadow-2xl rounded'
                        : (isset($embed)
                        ? 'md:w-1/2 text-white border border-secondary rounded' : 'md:w-1/3 z-10')
                }}
                mb-12 w-auto p-3 md:p-8 prose
            ">
            @if ($title)
                <h2>{{ $title }}</h2>
            @endif
            {!! $content !!}
        </div>

        @if(isset($embed))
            <div class="md:-mt-12 mb-12 cards justify-around rounded shadow-lg md:w-1/2 w-auto video__embed h-half">
                <x-youtube-embed :embed="$embed" />
            </div>
        @endif

        @if (isset($blocks) && !empty($blocks))
            <div class="border border-secondary text-steel-blue p-8 mb-12 projects cards justify-start rounded shadow-lg w-auto md:w-2/3">
                @foreach($blocks as $block)
                    <x-block :fields="$block" />
                @endforeach
            </div>
        @endif
    </div>
</div>