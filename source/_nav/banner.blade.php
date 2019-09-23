<header class="banner" role="banner">
    <div class="container flex items-center max-w-4xl mx-auto px-4 lg:px-8">
        <div class="flex items-center">
            <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                <span class="banner__title">{{ $page->siteName }}</span>
            </a>
        </div>

        <div id="vue-search" class="flex flex-1 justify-end items-center">
            <search></search>

            @include('_nav.menu')

            @include('_nav.menu-toggle')
        </div>
    </div>
</header>