<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'ОБЩЕСТВЕННАЯ ОРГАНИЗАЦИЯ "ВСЕРОССИЙСКИЙ ЭЛЕКТРОПРОФСОЮЗ' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            #myBtn {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 99;
                font-size: 18px;
                border: none;
                outline: none;
                background-color: #0083d9;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 4px;
            }

            #myBtn:hover {
                background-color: #afafaf;
                color: #606060;
            }
        </style>

        @livewireStyles
    </head>
    <body>
        {{ $slot }}
        @livewireScripts
    </body>
</html>
