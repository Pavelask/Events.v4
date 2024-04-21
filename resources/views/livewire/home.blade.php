<main>
    <mai class="bg-white">
        <div class="bg-white">
            <div class="bg-white">
                <header class="absolute inset-x-0 top-0 z-50">
                    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                        <div class="flex lg:flex-1">
                            <a href="/" class="-m-1.5 p-1.5">
                                <span class="sr-only">ВЭП</span>
                                <img class="h-12 w-auto" src="{{ asset('/front/img/logo_01.png') }}" alt="">
                            </a>
                        </div>
                        <div class="flex lg:hidden">
                            <button type="button" wire:click="openMenu"
                                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                                <span class="sr-only">Открыть меню</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor"
                                     aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                                </svg>
                            </button>
                        </div>
                        <div class="hidden lg:flex lg:gap-x-12">
                            <a href="/" class="leading-6 uppercase text-white">Главная</a>
                            <a href="#jury" class="leading-6 uppercase text-white">Жюри мероприятия</a>
                            <a href="#guest" class="leading-6 uppercase text-white">Гости мероприятия</a>
                            <a href="#command" class="leading-6 uppercase text-white">Команды</a>
                            <a href="#" class="leading-6 uppercase text-white">Партнеры</a>
                            <a href="#timeline" class="leading-6 uppercase text-white">Расписание</a>
                            <a href="#contact" class="leading-6 uppercase text-white">Контакты</a>
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
                                        <span class="sr-only">ВЭП</span>
                                        <img class="h-12 w-auto"
                                             src="{{ asset('/front/img/logo_01.png') }}" alt="">
                                    </a>
                                    <button wire:click="closeMenu" type="button"
                                            class="-m-2.5 rounded-md p-2.5 text-gray-400">
                                        <span class="sr-only">Close menu</span>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mt-6 flow-root">
                                    <div class="-my-6 divide-y divide-gray-500/25">
                                        <div class="space-y-2 py-6">
                                            <a href="/"
                                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Главная</a>
                                            <a href="#jury" wire:click="closeMenu"
                                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Жюри мероприятия</a>
                                            <a href="#guest" wire:click="closeMenu"
                                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Гости мероприятия</a>
                                            <a href="#" wire:click="closeMenu"
                                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Команды</a>
                                            <a href="#" wire:click="closeMenu"
                                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Партнеры</a>
                                            <a href="#timeline" wire:click="closeMenu"
                                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Расписание</a>
                                            <a href="#contact" wire:click="closeMenu"
                                               class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Контакты</a>
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
                                <img src="{{ asset('front/img/logoo_0002.png') }}" alt="" class="w-96 object-cover ">
                            </div>
                            <h1 class="text-xl leading-8 text-white sm:text-2xl uppercase">
                                {{ $Event->name }}
                            </h1>
                            <h5 class="mt-6 text-xl font-bold leading-8 text-gray-100 uppercase">
                                {{ date('d-m-Y', strtotime($Event->date_start)) }}
                                &nbsp; {{ date('d-m-Y', strtotime($Event->date_end)) }}
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


                {{--  Жюри  --}}

                <div id="jury" class="bg-white py-24 md:py-32">
                    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-5">
                        <div class="max-w-2xl xl:col-span-2">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                                Жюри меропрприятия
                            </h2>
                            <p class="mt-6 text-base leading-8 text-gray-600">
                                Турнир является официальным соревнованием в области охраны труда и промышленной
                                безопасности,
                                имеющий всероссийский статус, приурочен к «Всемирному дню охраны труда» и проходит в
                                рамках
                                объявленного Всероссийским Электропрофсоюзом Года охраны труда.
                            </p>
                        </div>
                        <ul role="list" class="-mt-12 space-y-12 divide-y divide-gray-200 xl:col-span-3">
                            @if($Moderators)
                                @foreach($Moderators as $Moderator)
                                    <li class="flex flex-col gap-10 pt-12 sm:flex-row">
                                        <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
                                             src="{{ asset('storage/'.$Moderator->image) }}"
                                             alt="">
                                        <div class="max-w-xl flex-auto">
                                            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">{{$Moderator->last_name }} {{$Moderator->first_name  }} {{$Moderator->middle_name  }}</h3>
                                            <p class="text-base leading-7 text-gray-600">{{$Moderator->job_title  }}</p>
                                            <p class="mt-6 text-base leading-7 text-gray-600">
                                                {!! $Moderator->description !!}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
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

                <div id="guest" class="bg-white py-24 sm:py-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl sm:text-center">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                                Гости мероприятия
                            </h2>
                            <p class="mt-6 text-lg leading-8 text-gray-600">
                                Задачами Турнира являются - привлечение внимания работодателей, работников и их
                                представителей к
                                решению вопросов улучшения системы охраны труда на предприятиях электроэнергетической
                                отрасли.
                            </p>
                        </div>
                        <ul role="list"
                            class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:max-w-4xl lg:gap-x-8 xl:max-w-none">
                            @if($Guests)
                                @foreach($Guests as $Guest)
                                    <li class="flex flex-col gap-6 xl:flex-row">
                                        <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
                                             src="{{ asset('storage/'.$Guest->image) }}"
                                             alt="">
                                        <div class="flex-auto">
                                            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">
                                                {{$Guest->last_name }} {{$Guest->first_name }} {{$Guest->middle_name }}
                                            </h3>
                                            <p class="text-base leading-7 text-gray-600">{{$Guest->job_title}}</p>

                                        </div>
                                    </li>
                                @endforeach
                            @endif

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
                            <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center">
                                {{ $Greeting->greetings_title }}
                            </h2>
                            <div class="mt-6 text-justify pt-4">
                                {!! $Greeting->greetings_text !!}
                            </div>
                        </div>
                        <figure class="pt-10">
                            <img class="aspect-video rounded-xl bg-gray-50 object-cover"
                                 src="{{ asset('front/img/0000.png') }}"
                                 alt="">
                            <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                                <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20"
                                     fill="currentColor"
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



                            <div id="command" class="mx-auto max-w-7xl px-6 lg:px-8 pt-20">
                                <div class="mx-auto max-w-2xl lg:max-w-none pb-32">
                                    <h1 class="text-lg font-semibold leading-8 text-gray-900 text-center uppercase pb-3">
                                        Команды I Всероссийского турнира по охране труда и промышленной безопасности
                                    </h1>
                                    <div
                                        class="mx-auto mt-10 grid grid-cols-4 items-start gap-x-8 gap-y-10 sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:grid-cols-5">


                                        @if($Organizers)
                                            @foreach($Organizers as $Organizer)

                                                <!-- Card -->
                                                <div class="group block rounded-xl">
                                                    <div class="aspect-w-16 aspect-h-9">
                                                        <img class="object-cover rounded-xl" src="{{ asset('storage/'.$Organizer->image) }}">
                                                    </div>
                                                    <h4 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-teal-600 dark:text-neutral-300 dark:group-hover:text-white text-center">
                                                        {{$Organizer->last_name}}
                                                    </h4>
                                                </div>
                                                <!-- End Card -->
                                            @endforeach
                                        @endif

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


                <div id="timeline" class="bg-white px-4 py-24 lg:px-6">
                    <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-left">
                            Расписание мероприятия
                        </h2>
                        <div class="container max-w-5xl px-4 py-12 mx-auto">
                            <div class="grid gap-4 mx-4 sm:grid-cols-12">

                                @if($Schedules->isNotEmpty())
                                    @foreach($Schedules as $Schedule)
                                        <div class="col-span-12 sm:col-span-3">
                                            <div
                                                class="text-center sm:text-left mb-14 before:block before:w-24 before:h-3 before:mb-5 before:rounded-md before:mx-auto sm:before:mx-0 before:bg-teal-600">
                                            <span
                                                class="text-base font-bold tracking-wider uppercase text-gray-600">
                                                {{ $Schedule->alt_data }}
                                            </span>
                                                <span
                                                    class="text-sm tracking-wider uppercase text-gray-400">
                                                {{ $Schedule->week }}
                                            </span>
                                            </div>
                                        </div>
                                        <div class="relative col-span-12 px-4 space-y-6 sm:col-span-9">
                                            @foreach($Timeline as $Time)
                                                @if($Schedule->id == $Time->event_schedules_id)
                                                    <div
                                                        class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-gray-300">
                                                        <div
                                                            class="flex flex-col sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-teal-600">
                                                            <h3 class="text-xl font-semibold tracking-wide">
                                                                {{ $Time->title }}
                                                            </h3>
                                                            <time class="text-xs tracking-wide uppercase text-gray-600">
                                                                {{ $Time->time }}
                                                            </time>
                                                            <p class="mt-3">
                                                                {{ $Time->place }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endif
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
                <div id="contact" class="max-w-7xl px-4 lg:px-6 lg:px-8 py-12 lg:py-24 mx-auto bg-white">
                    <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
                        <h2 class="font-medium text-black text-2xl sm:text-4xl dark:text-white">
                            Контакты
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
                        <div
                            class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl border border-b-gray-400 dark:bg-neutral-800">
                            {!! $Adress->map_code !!}
                        </div>
                        <!-- End Col -->

                        <div class="space-y-8 lg:space-y-16">
                            <div>
                                <h3 class="mb-5 font-semibold text-black dark:text-white">
                                    Адрес проведения мероприятия
                                </h3>

                                <!-- Grid -->
                                <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                                    <div class="flex gap-4">
                                        <svg class="flex-shrink-0 size-5 text-gray-500 dark:text-neutral-500"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>

                                        <div class="grow">
                                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                                {{ $Adress->city }}
                                            </p>
                                            <address class="mt-1 text-black not-italic dark:text-white">
                                                {{ $Adress->adress }}
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Grid -->
                            </div>

                            <div>
                                <h3 class="mb-5 font-semibold text-black dark:text-white">
                                    Контакты организатора
                                </h3>

                                <!-- Grid -->
                                <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-2">
                                    <div class="flex gap-4">

                                        <svg class="flex-shrink-0 size-5 text-gray-500 dark:text-neutral-500"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                        </svg>

                                        <div class="grow">
                                            <p>
                                                {{ $Adress->contact_info }}
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


            </div>

        </div>

        <button id="to-top-button" onclick="goToTop()" title="Go To Top"
                class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-purple-600 hover:bg-purple-700 text-white text-lg font-semibold transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
            </svg>
            <span class="sr-only">Go to top</span>
        </button>

        <script>
            // Get the 'to top' button element by ID
            var toTopButton = document.getElementById("to-top-button");

            // Check if the button exists
            if (toTopButton) {

                // On scroll event, toggle button visibility based on scroll position
                window.onscroll = function() {
                    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                        toTopButton.classList.remove("hidden");
                    } else {
                        toTopButton.classList.add("hidden");
                    }
                };

                // Function to scroll to the top of the page smoothly
                window.goToTop = function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                };
            }
        </script>

</main>
