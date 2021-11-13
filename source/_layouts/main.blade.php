<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        {{-- Meta --}}
        @stack('meta')

        <link rel="home" href="{{ $page->baseUrl }}">

        @include('_components.favicon')

        <link href="https://fonts.googleapis.com/css?family=Poppins:500,800" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        @stack('styles')

        {{-- Analytics --}}
        @include('_components.analytics')
    </head>

    <body>
        {{-- Main banner --}}
        @include('_nav.banner')

        {{-- Responsive menu --}}
        @include('_nav.menu-responsive')

        <main role="main" class="main__content">
            @yield('body')
        </main>

        @include('_footer.footer')

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')
    </body>
</html>
