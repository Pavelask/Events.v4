<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VIII Всероссийский слёт молодёжи Общественной организации «Всероссийский Электропрофсоюз}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/swiper-bundle.min.css")}}">

    @livewireStyles
</head>
<body>

{{ $slot }}


@livewireScripts
<script src="{{asset("js/swiper-bundle.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
</body>
</html>
