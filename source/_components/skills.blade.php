@foreach ($skill as $type)
    <div class="w-full mb-4 sm:mb-8">
        <h3>{{ $type->title }}</h3>
        {{ $type->skills }}
    </div>
@endforeach