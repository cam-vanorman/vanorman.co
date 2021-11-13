<div class="cards">
    <div class="projects cards justify-center p-0 mx-auto container">
        @foreach ($cards as $card)
            @if(!$card->getContentType()->getId() === 'projects')
                <x-project-card
                    class="lg:w-1/3"
                    :title="$card['title']"
                    :slug="$card['slug']"
                    :projectUrl="$card['projectUrl']"
                    :brand="$card['brand']"
                    :brandColor="$card['brandColor']"
                    :cover="$card['cover']"
                    :coverWidth="$card['coverWidth']"
                    :featured="$card['featured']"
                    :launched="$card['launched']"
                />
            @else
                <x-card
                    class="lg:w-1/3"
                    :title="$card['title']"
                    :slug="$card['slug']"
                    :url="$card['url']"
                    :brand="$card['brand']"
                />
            @endif
        @endforeach
    </div>
</div>