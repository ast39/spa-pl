<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

        <title>@yield('title')</title>

        @php
            include_once public_path() . '/images/flags.svg';
            include_once public_path() . '/images/site_sprite.svg';
        @endphp

        <!-- CSS grubber -->
        @stack('css')

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('fonts/MuseoSansCyrl/MuseoSansCyrlNew.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/slick_1.8.1.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/slick_1.8.1_theme.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css?v=' . time()) }}" />
    </head>

    <body>
        <!-- шапка -->
        @include('components/navbar')

        <main class="py-4 site-conteiner">
            <div>@yield('content')</div>
        </main>
        
        <!-- подвал -->
        @include('components/footer')

        <script>
            var token = '{{ csrf_token() }}';
        </script>

        <script type="text/javascript" src="{{ asset('/js/jquery-3.7.1.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="{{ asset('/js/jwplayer-7.4.2/jwplayerwithkey_v2.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/slick_1.8.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/dselect.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/script.js?v=' . time()) }}"></script>

        <!-- JS grubber -->
        @stack('js')
    </body>
</html>