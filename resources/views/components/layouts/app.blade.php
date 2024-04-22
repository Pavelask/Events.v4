<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Всероссийский Турнир по охране труда и промышленной безопасности в формате интеллектуальной игры «БРЕЙН-РИНГ»' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>

        @livewireStyles
    </head>
    <body>

        {{ $slot }}
        @livewireScripts
    </body>
</html>
