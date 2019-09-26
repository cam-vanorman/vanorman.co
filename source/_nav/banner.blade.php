<header class="banner" role="banner">
    <div class="container flex items-center max-w-4xl mx-auto px-4 lg:px-8">
        <div class="flex items-center">
            <a href="/" title="{{ $page->siteName }} home" class="inline-flex px-5">
                <h1 class="banner__title">{{ $page->siteName }}</h1>
            </a>
        </div>

        <div class="flex flex-1 justify-end items-center">
            @include('_nav.menu')

            @include('_nav.menu-toggle')
        </div>
    </div>
</header>