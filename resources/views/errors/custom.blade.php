<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>404 Not Found</title>
</head>

<div class="relative h-screen overflow-hidden bg-indigo-900">
    <img src="{{asset("front/8.svg")}}" class="absolute object-cover w-full h-full"/>
    <div class="absolute inset-0 bg-black opacity-25">
    </div>
    <div class="container relative z-10 flex items-center px-6 py-32 mx-auto md:px-12 xl:py-40">
        <div class="relative z-10 flex flex-col items-center w-full font-mono">
            <h1 class="mt-4 text-5xl font-extrabold leading-tight text-center text-white">
                @yield('message')
            </h1>
            <p class="font-extrabold text-white text-8xl my-44 animate-bounce">
                @yield('code')
            </p>
        </div>
    </div>
</div>

</body>
</html>
