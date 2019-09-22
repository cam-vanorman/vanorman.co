
<div class="w-full block mb-5 mx-auto text-center">
  <h3>Built With</h3>
  @foreach($tags as $tag)
    <span class="inline-flex rounded-full bg-tertiary text-steel-blue uppercase px-2 py-1 text-xs mr-3">{{ $tag }}</span>
  @endforeach
</div>