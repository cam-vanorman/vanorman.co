<footer class="page__footer">
  <div class="page__footer-text">
    <div class="container cards">
      @if($page->getPath() !== '/contact')
        {{-- To-Do: Build into contentful --}}
        @php
          $cta_title   = 'Need an experienced ' . $page->site['role'] . '?';
          $cta_message = "Let's connect!";
          $cta_link    = "/contact";
        @endphp

        @include('_components.cta', ['title' => $cta_title, 'message' => $cta_message, 'link' => $cta_link])
      @else
        {{-- To-Do: Build into contentful --}}
        @php
          $cta_title   = "Not ready to contact me just yet?";
          $cta_message = "Browse my recent work";
          $cta_link    = "/projects";
        @endphp
        @include('_components.cta', ['title' => $cta_title, 'message' => $cta_message, 'link' => $cta_link])
      @endif

    </div>
  </div>
  <div class="page__footer-text mx-auto">
    <div class="page__footer-logo">
      <a class="md:inline-block" href="/">
        <img
          class="logo__image mx-auto mb-10 sm:m-0"
          src="{{ $page->site['logo'] }}"
          alt="{{ $page->site['name'] }}">
      </a>
    </div>
  </div>
  <div class="copyright">
    @include('_components.social')
    <p class="mb-0">&copy; {{ $page->site['name'] }}</p>
  </div>
</footer>