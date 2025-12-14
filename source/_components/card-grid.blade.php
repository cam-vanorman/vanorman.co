@props([
    'collectionType',
    'collection',
])

<div class="{{ $collectionType === 'projects' ? 'projects' : '' }} cards justify-center p-0 mx-auto container">
    @switch ($collectionType)
        @case ('projects')
            @foreach ($collection as $project)
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
        @break
        @case ('posts')
            {{-- @foreach ($collection as $post)
                <x-post-card
                    class="lg:w-1/2"
                    :post="$post"
                />
            @endforeach --}}
        @break
    @endswitch
</div>