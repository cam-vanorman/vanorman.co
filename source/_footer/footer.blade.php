<footer class="page__footer">
    <div class="page__footer-text mx-auto">
        <div class="page__footer-logo">
            <a class="md:inline-block" href="/">
                <img
                    class="logo__image mx-auto mb-10 sm:m-0"
                    src="{{ $page->site['logo'] }}"
                    alt="{{ $page->site['name'] }}"
                >
            </a>
        </div>
    </div>
    <div class="copyright">
        @include('_components.social')
        <p class="mb-0">&copy; {{ $page->site['name'] }}</p>
    </div>
</footer>