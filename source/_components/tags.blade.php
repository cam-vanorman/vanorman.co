
<div class="w-full block mb-5 mx-auto text-center">
  <h3>Built With</h3>
  @foreach($tags as $tag)
    <span class="inline-flex rounded bg-tertiary text-steel-blue px-2 py-1 text-xs mb-1 mr-1">{{ $tag }}</span>
  @endforeach
</div>