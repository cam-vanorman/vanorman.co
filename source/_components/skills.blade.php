@foreach ($skill as $type)
    <div class="w-full sm:mb-6">
        <h3 class="mb-1">{{ $type->title }}</h3>
        <p class="mt-0">{{ $type->skills }}</p>
    </div>
@endforeach