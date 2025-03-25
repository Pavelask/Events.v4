<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="antialiased">
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-700 dark:text-primary-500">@yield('code')</h1>
            <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white"> @yield('message')</p>
            <p class="text-lg font-light text-gray-500 dark:text-gray-400">
                We are already working to solve the problem.
            </p>
            <p class="mt-0 mb-4 text-lg font-light text-gray-500 dark:text-gray-400">
                Мы уже работаем над устранением проблемы.
            </p>
            <p class="mt-0 mb-4 text-lg font-light text-gray-500 dark:text-gray-400">
                <a class="read-btn" href="{{ route('register') }}">
                    Регистрация <i class="uil uil-arrow-right"></i>
                </a>
            </p>

        </div>
    </div>
</section>
</body>
</html>
