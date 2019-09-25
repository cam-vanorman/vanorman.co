@foreach ($skill as $type)
    <div class="w-full mb-4 sm:mb-6">
        <h3>{{ $type->title }}</h3>
        <p>{{ $type->skills }}</p>
    </div>
@endforeach