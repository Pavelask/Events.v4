<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'ОБЩЕСТВЕННАЯ ОРГАНИЗАЦИЯ "ВСЕРОССИЙСКИЙ ЭЛЕКТРОПРОФСОЮЗ"' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-white">
<div class="bg-white">
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-12 w-auto" src="{{ asset('/front/img/logo_01.png') }}" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="leading-6 uppercase text-white">Главная</a>
                    <a href="#" class="leading-6 uppercase text-white">Организаторы</a>
                    <a href="#" class="leading-6 uppercase text-white">Гости мероприятия</a>
                    <a href="#" class="leading-6 uppercase text-white">Партнеры</a>
                    <a href="#" class="leading-6 uppercase text-white">Расписание</a>
                    <a href="#" class="leading-6 uppercase text-white">Контакты</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">

                </div>
            </nav>

            @if($isOpen)
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto"
                                 src="{{ asset('/front/img/logo_01.png') }}" alt="">
                        </a>
                        <button wire:click="closeMenu" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/25">
                            <div class="space-y-2 py-6">
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Product</a>
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Features</a>
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Marketplace</a>
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Company</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endif

        </header>

        <div class="relative isolate overflow-hidden pt-2">
            <img src="{{ asset('front/img/brejn-ring.jpg') }}" alt=""
                 class="absolute inset-0 -z-10 h-full w-full object-cover">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                 aria-hidden="true">
                <div
                    class="relative left-1 aspect-[1] w-full h-full rotate-[10deg] bg-gradient-to-r from-blue-800 to-gray-800 opacity-70"></div>
            </div>
            <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('front/img/logo_00.png') }}" alt="" class="w-96 object-cover ">
                    </div>
                    <h1 class="text-xl leading-8 text-white sm:text-2xl uppercase">I Всероссийский Турнир по охране
                        труда и
                        промышленной безопасности в формате интеллектуальной игры «БРЕЙН-РИНГ»</h1>
                    <h5 class="mt-6 text-xl font-bold leading-8 text-gray-100 uppercase">
                        24 апреля 2024 - 27 апреля 2024
                    </h5>
                </div>
            </div>
            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>
    </div>


    {{--  Организаторы  --}}

    <div class="bg-white py-24 md:py-32">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-5">
            <div class="max-w-2xl xl:col-span-2">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Организаторы меропрприятия
                </h2>
                <p class="mt-6 text-base leading-8 text-gray-600">
                    Турнир является официальным соревнованием в области охраны труда и промышленной безопасности,
                    имеющий всероссийский статус, приурочен к «Всемирному дню охраны труда» и проходит в рамках
                    объявленного Всероссийским Электропрофсоюзом Года охраны труда.
                </p>
            </div>
            <ul role="list" class="-mt-12 space-y-12 divide-y divide-gray-200 xl:col-span-3">
                <li class="flex flex-col gap-10 pt-12 sm:flex-row">
                    <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
                         src="{{ asset('front/img/6mza.jpg') }}"
                         alt="">
                    <div class="max-w-xl flex-auto">
                        <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">МУРУШКИН АЛЕКСАНДР
                            ВЛАДИМИРОВИЧ</h3>
                        <p class="text-base leading-7 text-gray-600">Заместитель председатаеля ВЭП</p>
                        <p class="mt-6 text-base leading-7 text-gray-600">
                            Ежегодно обучается на курсах повышения квалификации по различным направлениям деятельности.
                        </p>
                    </div>
                </li>

                <!-- More people... -->
            </ul>
        </div>
    </div>

{{--Start banner--}}
    <div class="p-6 py-12 bg-teal-600 text-gray-50 mx-12">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-center   ">
                <h2 class="text-center text-6xl tracking-tighter font-bold">ВТБ БАННЕР
                </h2>
            </div>
        </div>
    </div>

{{--End Banner--}}


    {{--  Гости мепроприяия   --}}

    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Гости мероприятия
                </h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Задачами Турнира являются - привлечение внимания работодателей, работников и их представителей к
                    решению вопросов улучшения системы охраны труда на предприятиях электроэнергетической отрасли.
                </p>
            </div>
            <ul role="list"
                class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:max-w-4xl lg:gap-x-8 xl:max-w-none">
                <li class="flex flex-col gap-6 xl:flex-row">
                    <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
                         src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                         alt="">
                    <div class="flex-auto">
                        <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">Leonard Krasner</h3>
                        <p class="text-base leading-7 text-gray-600">Senior Designer</p>
                        <p class="mt-6 text-base leading-7 text-gray-600">Quia illum aut in beatae. Possimus dolores
                            aliquid accusantium aut in ut non assumenda. Enim iusto molestias aut deleniti eos aliquid
                            magnam molestiae. At et non possimus ab. Magni labore molestiae nulla qui.</p>
                    </div>
                </li>

                <!-- More people... -->
            </ul>
        </div>
    </div>


    <div class="relative bg-white">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center">
    <span class="bg-white px-2 text-gray-500">
      <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path
            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
      </svg>
    </span>
        </div>
    </div>


    {{--  Речь  --}}

    <div class="bg-white px-6 py-12 lg:px-8">
        <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
            <div class="mt-4 max-w-3xl">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center">Участникам и гостям I
                    Всероссийского турнира по охране труда и промышленной безопасности</h2>
                <p class="mt-6 text-justify">
                    Дорогие друзья!
                    От имени Министерства энергетики Российской Федерации и от себя лично приветствую Вас на I
                    Всероссийском турнире по охране труда и промышленной безопасности.
                    Турнир проходит в преддверии «Всемирного дня охраны труда», его ключевая задача - привлечь внимание
                    работодателей и сотрудников к развитию культуры производственной безопасности на рабочих местах и
                    сформировать у участников позитивное отношение к требованиям охраны труда.
                    Безусловно, создание безопасных и здоровых условий труда является приоритетом для Министерства и
                    одним из важнейших направлений нашего взаимодействия со сторонами социального партнерства.
                    Отрадно видеть на турнире талантливых МОЛОДЫХ представителей энергокомпаний, что говорит о запросе
                    молодёжи на осознанное отношение к производственной безопасности.
                    Желаю всем участникам турнира в полной мере продемонстрировать свои знания и накопленный опыт!
                </p>
            </div>
            <figure class="pt-10">
                <img class="aspect-video rounded-xl bg-gray-50 object-cover" src="{{ asset('front/img/0000.png') }}"
                     alt="">
                <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                    <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                              clip-rule="evenodd"/>
                    </svg>
                    Статс-секретарь - заместитель Министра энергетики Российской Федерации
                    А.Б. Бондаренко
                </figcaption>
            </figure>
        </div>
    </div>


    <div class="relative bg-white">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-100"></div>
        </div>
        <div class="relative flex justify-center">
    <span class="bg-white px-2 text-gray-100">
      <svg class="h-5 w-5 text-gray-100" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path
            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
      </svg>
    </span>
        </div>
    </div>

    <div class="bg-white py-24 sm:py-2424">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:max-w-none pb-32">
                <h2 class="text-lg font-semibold leading-8 text-gray-500">Trusted by the world’s most innovative
                    teams</h2>
                <div
                    class="mx-auto mt-10 grid grid-cols-4 items-start gap-x-8 gap-y-10 sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:grid-cols-5">
                    <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1"
                         src="https://tailwindui.com/img/logos/transistor-logo-gray-900.svg" alt="Transistor"
                         width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1"
                         src="https://tailwindui.com/img/logos/reform-logo-gray-900.svg" alt="Reform" width="158"
                         height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1"
                         src="https://tailwindui.com/img/logos/tuple-logo-gray-900.svg" alt="Tuple" width="158"
                         height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1"
                         src="https://tailwindui.com/img/logos/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158"
                         height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain object-left lg:col-span-1"
                         src="https://tailwindui.com/img/logos/statamic-logo-gray-900.svg" alt="Statamic" width="158"
                         height="48">
                </div>
            </div>
        </div>


        <div class="relative bg-white">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
    <span class="bg-white px-2 text-gray-500">
      <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path
            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
      </svg>
    </span>
            </div>
        </div>


        {{--  TimeLine  --}}

        <div class="bg-white px-6 py-24 lg:px-8">
            <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-left">
                    Расписание мероприятия
                </h2>
                <div class="container max-w-5xl px-4 py-12 mx-auto">
                    <div class="grid gap-4 mx-4 sm:grid-cols-12">
                        <div class="col-span-12 sm:col-span-3">
                            <div
                                class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:bg-teal-600">
                            <span
                                class="text-base font-bold tracking-wider uppercase text-gray-600">24 апреля 2024</span>
                            </div>
                        </div>
                        <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
                            <div
                                class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-gray-300">
                                <div
                                    class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-teal-600">
                                    <h3 class="text-xl font-semibold tracking-wide">Donec porta enim vel </h3>
                                    <time class="text-xs tracking-wide uppercase text-gray-600">Dec 2020</time>
                                    <p class="mt-3">Pellentesque feugiat ante at nisl efficitur, in mollis orci
                                        scelerisque.
                                        Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                </div>
                                <div
                                    class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-teal-600">
                                    <h3 class="text-xl font-semibold tracking-wide">Donec porta enim vel </h3>
                                    <time class="text-xs tracking-wide uppercase text-gray-600">Dec 2020</time>
                                    <p class="mt-3">Pellentesque feugiat ante at nisl efficitur, in mollis orci
                                        scelerisque.
                                        Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                </div>
                                <div
                                    class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-teal-600">
                                    <h3 class="text-xl font-semibold tracking-wide">Donec porta enim vel </h3>
                                    <time class="text-xs tracking-wide uppercase text-gray-600">Dec 2020</time>
                                    <p class="mt-3">Pellentesque feugiat ante at nisl efficitur, in mollis orci
                                        scelerisque.
                                        Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                </div>
                                <div
                                    class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-teal-600">
                                    <h3 class="text-xl font-semibold tracking-wide">Aliquam sit amet nunc ut</h3>
                                    <time class="text-xs tracking-wide uppercase text-gray-600">Jul 2019</time>
                                    <p class="mt-3">Morbi vulputate aliquam libero non dictum. Aliquam sit amet nunc ut
                                        diam
                                        aliquet tincidunt nec nec dui. Donec mollis turpis eget egestas sodales.</p>
                                </div>
                                <div
                                    class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-teal-600">
                                    <h3 class="text-xl font-semibold tracking-wide">Pellentesque habitant morbi</h3>
                                    <time class="text-xs tracking-wide uppercase text-gray-600">Jan 2016</time>
                                    <p class="mt-3">Suspendisse tincidunt, arcu nec faucibus efficitur, justo velit
                                        consectetur nisl, sit amet condimentum lacus orci nec purus. Mauris quis quam
                                        suscipit, vehicula felis id, vehicula enim.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="relative bg-white">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
    <span class="bg-white px-2 text-gray-500">
      <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path
            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
      </svg>
    </span>
            </div>
        </div>


        <!-- Contact -->
        <div class="max-w-7xl px-4 lg:px-6 lg:px-8 py-12 lg:py-24 mx-auto bg-white">
            <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
                <h2 class="font-medium text-black text-2xl sm:text-4xl dark:text-white">
                    Contacts
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
                <div
                    class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl dark:bg-neutral-800">
                    <img
                        class="group-hover:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl"
                        src="https://images.unsplash.com/photo-1572021335469-31706a17aaef?q=80&w=3540&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Image Description">
                </div>
                <!-- End Col -->

                <div class="space-y-8 lg:space-y-16">
                    <div>
                        <h3 class="mb-5 font-semibold text-black dark:text-white">
                            Our address
                        </h3>

                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                            <div class="flex gap-4">
                                <svg class="flex-shrink-0 size-5 text-gray-500 dark:text-neutral-500"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>

                                <div class="grow">
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                                        United Kingdom
                                    </p>
                                    <address class="mt-1 text-black not-italic dark:text-white">
                                        300 Bath Street, Tay House<br>
                                        Glasgow G2 4JR
                                    </address>
                                </div>
                            </div>
                        </div>
                        <!-- End Grid -->
                    </div>

                    <div>
                        <h3 class="mb-5 font-semibold text-black dark:text-white">
                            Our contacts
                        </h3>

                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                            <div class="flex gap-4">
                                <svg class="flex-shrink-0 size-5 text-gray-500 dark:text-neutral-500"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path
                                        d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"></path>
                                    <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                                </svg>

                                <div class="grow">
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                                        Email us
                                    </p>
                                    <p>
                                        <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 hover:before:bg-black focus:outline-none focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white"
                                           href="mailto:example@site.so">
                                            hello@example.so
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <svg class="flex-shrink-0 size-5 text-gray-500 dark:text-neutral-500"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>

                                <div class="grow">
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                                        Call us
                                    </p>
                                    <p>
                                        <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 hover:before:bg-black focus:outline-none focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white"
                                           href="mailto:example@site.so">
                                            +44 222 777-000
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End Grid -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
        </div>
        <!-- End Contact -->


        {{-- Footer--}}

        <footer class="bg-white">
            <div class="mx-auto max-w-7xl overflow-hidden pt-10 px-6 lg:px-8">
                <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
                    <div class="pb-6">
                        <a href="#" class="text-base uppercase leading-6 text-gray-600 hover:text-gray-900">About</a>
                    </div>
                    <div class="pb-6">
                        <a href="#" class="text-base uppercase leading-6 text-gray-600 hover:text-gray-900">Blog</a>
                    </div>
                    <div class="pb-6">
                        <a href="#" class="text-base uppercase leading-6 text-gray-600 hover:text-gray-900">Jobs</a>
                    </div>
                    <div class="pb-6">
                        <a href="#" class="text-base uppercase leading-6 text-gray-600 hover:text-gray-900">Press</a>
                    </div>
                    <div class="pb-6">
                        <a href="#"
                           class="text-base uppercase leading-6 text-gray-600 hover:text-gray-900">Accessibility</a>
                    </div>
                    <div class="pb-6">
                        <a href="#" class="text-base uppercase leading-6 text-gray-600 hover:text-gray-900">Partners</a>
                    </div>
                </nav>
                <div class="mt-10 flex justify-center space-x-10">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">YouTube</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
                <p class="mt-10 text-center text-xs leading-5 text-gray-500">&copy; 2020 Your Company, Inc. All rights
                    reserved.</p>
            </div>
        </footer>


@livewireScripts
</body>
</html>
