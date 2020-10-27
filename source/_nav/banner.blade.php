<header class="banner" role="banner">
    <div class="container flex items-center max-w-screen-xl mx-auto">
        <div class="flex flex-1 items-center">
            <a href="/" title="{{ $page->site['name'] }} home" class="inline-flex px-3">
                @if(!$page->site['logo'])
                    <h1 class="banner__title">{{ $page->site['name'] }}</h1>
                @else
                    <img class="logo__image" src="{{ $page->site['logo'] }}" alt="{{ $page->site['name'] }} Logo">
                @endif
            </a>
        </div>

        <div class="flex flex-1 justify-end items-center">
            @include('_nav.menu')

            @include('_nav.menu-toggle')
        </div>
    </div>
</header>