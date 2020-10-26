@foreach ($skill as $type)
    <div class="w-full md:w-1/2 sm:mb-6">
        <h3>{{ $type->title }}</h3>
        <div class="tags">
            @php
                $skills = explode(', ', $type->skills);
            @endphp
            @foreach($skills as $tag)
                <span class="tag">{{ $tag }}</span>
            @endforeach
        </div>
    </div>
@endforeach
