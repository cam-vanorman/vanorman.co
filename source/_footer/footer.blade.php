<footer class="page__footer">
  <div class="page__footer-text">
    <div class="container cards">
      <div class="card">
        <a href="/contact">
          <div class="card__body">
            <h3 class="card__title">
              Need an experienced {{ $page->siteRole }}?
            </h3>
            <p class="card__text">
              Send me a message!
            </p>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="page__footer-text">
    <div class="container cards">
      <div class="page__footer-logo">
        <img
          class="logo__image mx-auto mb-10 sm:m-0"
          src="{{ $page->siteLogo }}"
          alt="{{ $page->siteName }}">
      </div>
      <nav class="menu">
        <h3 class="menu__title">Around the site</h3>
        <li class="menu__item">
          <a title="{{ $page->siteName }} About" href="/about"
              class="text-steel-blue hover:text-secondary">
              About
          </a>
        </li>
        <li class="menu__item">
          <a title="{{ $page->siteName }} Projects" href="/projects"
              class="text-steel-blue hover:text-secondary">
              Projects
          </a>
        </li>
        <li class="menu__item">
          <a title="{{ $page->siteName }} Contact" href="/contact"
              class="text-steel-blue hover:text-secondary">
              Contact
          </a>
        </li>
      </nav>
    </div>   
  </div>
  <div class="copyright">
    <p class="mb-0">&copy; 2018-{{ date('Y') }} {{ $page->siteName }}</p>
    <p class="mt-1 text-xs">{{ $page->siteDescription }}</p>
  </div>
</footer>