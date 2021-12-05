@switch($fields['blockType'])
    @case('heroComponent')
        <x-hero.page
            :title="$fields['title']"
            :content="$fields['body']"
        />
    @break
    @case('content')
        {{-- Refactor into blockType instead of field --}}
        @if (isset($fields['embeddedMedia']) && $fields['embeddedMedia'] != '')
            <x-section
                :title="$fields['title']"
                :content="$fields['body']"
                :embed="$fields['embeddedMedia']"
                :index="$index"
            />
        {{-- Refactor into blockType instead of field --}}
        @elseif (isset($fields['image']) && $fields['image'] != '')
            <x-page-header
                :title="$fields['title']"
                :content="$fields['body']"
                :image="$fields['image']"
                :index="$index"
            />
        @elseif (isset($fields['blocks']) && !empty($fields['blocks']))
            {{-- Generic Block section --}}
            <x-section
                :title="$fields['title']"
                :content="$fields['body']"
                :blocks="$fields['blocks']"
                :index="$index"
            />
        @endif
    @break

    {{-- Call to Action Component --}}
    @case('callToActionComponent')
        {{-- @dump($fields) --}}
        <x-cta
            :title="$fields['title']"
            :body="$fields['body']"
            :actions="$fields['actions']"
            :index="$index"
        />
    @break

    {{-- Card Grid --}}
    @case('cardGrid')
        {{-- @dump($fields) --}}
        @if (isset($fields['collectionType']) && !empty($fields['collectionType']))
            @if($fields['collectionType'] === 'projects')
                <x-card-grid
                    :collectionType="$fields['collectionType']"
                    :collection="$fields['collection']"
                    :featured="$fields['featured']"
                />
            @endif
        @endif
    @break

    {{-- Projects --}}
    @case('projects')
        @php
            $project = collect([
                'slug' => $fields['slug'],
                'projectUrl' => $fields['projectUrl'],
                'brand' => $fields['brand'],
                'brandColor' => $fields['brandColor'],
                'cover' => $fields['cover'],
                'coverWidth' => $fields['coverWidth'],
                'featured' => $fields['featured'],
                'launched' => $fields['launched'],
            ]);
        @endphp
        <x-project-card
            :project="$project"
        />
    @break

    {{-- Skill --}}
    @case('skill')
        <x-skills
            :title="$fields['title']"
            :skill="$fields['skill']"
        />
    @break
@endswitch