<div class="projects cards justify-center p-0 mx-auto container">
    @if($collectionType === 'projects' && $collection)
        @foreach($collection as $project) {
            @if($project->featured)
                <x-project-card
                    class="lg:w-1/2"
                    :project="$project"
                />
            @else
                <x-project-card
                    class="lg:w-1/3"
                    :project="$project"
                />
            @endif
        @endforeach

    {{-- @else
        <x-card
            class="lg:w-1/3"
            :title="$card->title"
            :slug="$card->slug"
            :url="$card['url']"
            :brand="$card['brand']"
        /> --}}
    @endif

</div>