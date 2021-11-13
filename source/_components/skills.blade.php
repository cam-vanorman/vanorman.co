<div class="w-full md:w-1/2 sm:mb-6 px-3">
    <h3>{{ $title }}</h3>
    <div class="tags">
        @foreach($skill as $tag)
            <span class="tag">{{ $tag }}</span>
        @endforeach
    </div>
</div>
