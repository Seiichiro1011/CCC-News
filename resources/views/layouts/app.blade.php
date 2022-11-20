<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') | {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <meta name="description"
        content="The best of the CCC, with the latest news and sport headlines, and much more from all over the world.
        ">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/_ajaxreact.js') }}"></script>
    <script src="{{ mix('js/_ajaxbookmark.js') }}"></script>
    @yield('script')


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ mix('css/footer.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/news_favicon.webp') }}">
    @yield('style')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZNZC58S384"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZNZC58S384');
    </script>
    
</head>

<body>
    <div id="app">
        <header>
            @include('layouts.body.navbar')
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        @if (!Route::is('login') && !Route::is('register'))
            <footer class="back-blue mt-5 w-100 pt-4">
                @include('layouts.body.footer')
            </footer>
        @endif
    </div>

    @yield('script_footer')

    <script type="text/javascript">
        $(function() {
            $('navbar-nav li').removeClass('current');
            let location_href = location.href;
            // remove the trailing slash on url to have the exact match
            if (location_href[location_href.length - 1] == '/') {
                location_href = location_href.slice(0, -1);
            }
            $('.navbar-nav li a').each(function() {
                var target = $(this).attr('href');
                if (location_href == target) {
                    $(this).closest('.nav-item').addClass('current');
                }
            });
        });
    </script>

</body>

</html>
