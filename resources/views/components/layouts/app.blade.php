<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>

    <meta name="application-name" content="{{ config('app.name') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>
        V Всероссийский семинар-совещание председателей первичных профсоюзных организаций Общественной организации
        «Всероссийский Электропрофсоюз» - «Время героев: труд, доблесть, победа»
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/swiper-bundle.min.css")}}">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
{{-- Main template Index Site   --}}
{{ $slot }}

<script src="{{asset("js/swiper-bundle.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
@livewireScripts
@filamentScripts

@vite('resources/js/app.js')
</body>
</html>
