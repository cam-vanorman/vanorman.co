<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->meta_description ?? $page->site['description'] }}">

        <title>{{ $page->site['name'] }} – {{ $page->site['role'] }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">

        @include('_components.favicon')

        {{-- Meta --}}
        @stack('meta')

        <link href="https://fonts.googleapis.com/css?family=Poppins:500,800" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        @stack('styles')

        {{-- Analytics --}}
        @include('_components.analytics')
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-steel-blue text-gray-900 leading-normal font-sans">
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
