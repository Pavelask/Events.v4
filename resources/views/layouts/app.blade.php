<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'VIII Всероссийский слёт молодёжи Общественной организации «Всероссийский Электропрофсоюз') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.22/fullpage.min.js" integrity="sha512-yHHLi2ZwgtW9QNVZd0asqMyWGJ6Kx73ijKlGWSi3MwYFB5ZzOJV8wPtopKr6muHk5SERgF3OB/2dZj3StlI34w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.22/fullpage.css" integrity="sha512-AIwt5sjXSKDo4t0KSQ/eAuy43kQMc1hYtIKLxaFrHd26nQFzMo1FJdBIickVyGXnhm2xB2OOYBqMBgu3dBU4KA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.22/fullpage.extensions.min.js" integrity="sha512-fOlK0nmiY4Q7hrlnFMgmEiXBzCaDtIWFLCjPNwb5YN0PqcpburbfkSJ2UL+rcfdslRbNlDeml6t1Se9WLmRKjw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </head>
    <body class="font-sans antialiased">
    mdasfjsdlk jflkg jslkfj
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            @if (isset($header))--}}
{{--                <header class="bg-white dark:bg-gray-800 shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endif--}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            $(document).ready(function() {
                $('#fullpage').fullpage({
                    //options here
                    autoScrolling:true,
                    scrollHorizontally: true
                });

                //methods
                $.fn.fullpage.setAllowScrolling(false);
            });
        </script>
    </body>
</html>
