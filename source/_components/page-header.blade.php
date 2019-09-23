@php
  $className = (isset($class) ? $class : false); 
  $content   = (isset($slug) ? $slug : false);
@endphp

<div class="page__header {{ $class }}">
  <div class="page__header-content">
    @if ($title)
      <h1>{{ $title }}</h1>
    @endif
    
    @if ($content)
      @include($content)
    @endif
  </div>
  @if ($image)
    <div class="page__header-image hidden lg:block">
        <img src="{{ $image }}" alt="{{ $title }} Image">
        <h3 class="hidden sr-only">{{ $title }}</h3>
    </div>
  @endif
</div>