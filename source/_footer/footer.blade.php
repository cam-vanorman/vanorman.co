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
    <nav class="menu">
      <h3 class="menu__title">Around the site</h3>
      <ul class="m-0 list-reset">
        <li class="menu__item">
          <a title="{{ $page->site['name'] }} Projects" href="/projects"
              class="text-steel-blue hover:text-secondary">
              Projects
          </a>
        </li>
        <li class="menu__item">
          <a title="{{ $page->site['name'] }} Contact" href="/contact"
              class="text-steel-blue hover:text-secondary">
              Contact
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="copyright">
    <p class="mb-0">&copy; {{ $page->site['name'] }}</p>
  </div>
</footer>