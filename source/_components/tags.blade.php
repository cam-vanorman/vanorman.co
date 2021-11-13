@if ($tags)
    <div class="tags">
        @foreach($tags as $tag)
            <span class="tag">{{ $tag }}</span>
        @endforeach
    </div>
@endif