<div>
    <header>
        <div class="nav-bar">
            <a href="" class="logo">
                <img src="{{ asset('front/img/logo_01.png') }}" alt="" class="h-16">
            </a>
            <div class="navigation">
                <div class="nav-items">
                    <i class="uil uil-times nav-close-btn"></i>
                    <a href="/"><i class="uil uil-home close-btn"></i>Главная</a>
                    <a href="#guest"><i class="uil uil-chat-bubble-user close-btn"></i>Гости</a>
                    {{--                    <a href="#moderators"><i class="uil uil-shield-check"></i>Модераторы</a>--}}
                    <a href="#timeline"><i class="uil uil-clock-three close-btn"></i>Расписание</a>
                    <a href="#documents"><i class="uil uil-document-info close-btn"></i>Документы</a>
                    <a href="#contact"><i class="uil uil-at close-btn"></i>Контакты</a>
                </div>
            </div>
            <i class="uil uil-apps nav-menu-btn"></i>
        </div>
    </header>

    <div class="relative isolate overflow-hidden pt-14">
        <img
            src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2830&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
            alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
             aria-hidden="true">
            <div
                class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-6xl py-32 sm:py-48 lg:py-56">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-3 py-1 text-sm leading-6">
                    {{--                <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">--}}
                    {{--                    Announcing our next round of funding. <a href="#" class="font-semibold text-white"><span class="absolute inset-0" aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>--}}
                </div>
            </div>
            <div class="text-center">
                <h1 class="text-xl font-bold tracking-tight text-gray-300 sm:text-2xl">
                    {{ $Event->fulldate }}
                </h1>
                <p class="mt-6 text-4xl leading-10 text-white sm:text-4x">
                    {{ $Event->name }}
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('register') }}"
                       class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">Регистрация</a>
                    <a href="#timeline" class="text-sm font-semibold leading-6 text-white">Подробнее <span
                            aria-hidden="true">→</span></a>
                </div>
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

    {{--    <section class="home">--}}
    {{--        <div class="media-icons">--}}
    {{--            <a target="_blank" href="https://vk.com/electrictradeunion"><i class="uil uil-vk-alt"></i></a>--}}
    {{--            <a target="_blank" href="https://t.me/elprofonline"><i class="uil uil-telegram-alt"></i></a>--}}
    {{--            <a target="_blank" href="https://www.youtube.com/channel/UCNZ4S-umLGk-t-NanNBUnaw/videos"><i class="uil uil-youtube"></i></a>--}}
    {{--        </div>--}}

    {{--        <div class="swiper bg-slider">--}}
    {{--            <div class="swiper-wrapper">--}}
    {{--                <div class="swiper-slide dark-layer">--}}
    {{--                    <img src="{{asset("front/image/films_puzzl.jpg")}}"/>--}}
    {{--                    --}}{{--                    <div class="card">--}}
    {{--                    --}}{{--                        <img src="{{asset("front/image/1-1.png")}}"/>--}}
    {{--                    --}}{{--                    </div>--}}
    {{--                    <div class="text-content">--}}

    {{--                        <h2 class="title">"Новое п<span>ОКО</span>ление"</h2>--}}
    {{--                        <h2 class="data">30 сентября – 05 октября 2024 года</h2>--}}
    {{--                        <h2 class="subtitle">VIII Всероссийский слёт молодёжи Общественной организации «Всероссийский Электропрофсоюз»</h2>--}}

    {{--                        <a class="read-btn" href="{{ route('register') }}">--}}
    {{--                            Регистрация <i class="uil uil-arrow-right"></i>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="swiper-slide dark-layer">--}}
    {{--                    <img src="{{asset("front/image/001.JPG")}}"/>--}}
    {{--                    <div class="card">--}}
    {{--                        <img src="{{asset("front/image/1-1.png")}}"/>--}}
    {{--                    </div>--}}
    {{--                    <div class="text-content">--}}
    {{--                        <h2 class="title">Аида Гамидова</h2>--}}
    {{--                        <h2 class="subtitle">Учредитель и директор АНО «Махачкалинский центр НЛП».</h2>--}}
    {{--                        <p>--}}
    {{--                            «Ограничивающие убеждения или что мешает нашему успеху».--}}
    {{--                        </p>--}}
    {{--                        <a class="read-btn" href="{{ route('register') }}">--}}
    {{--                            Регистрация <i class="uil uil-arrow-right"></i>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="swiper-slide dark-layer">--}}
    {{--                    <img src="{{asset("front/image/002.JPG")}}"/>--}}
    {{--                    <div class="card">--}}
    {{--                        <img src="{{asset("front/image/1-2.png")}}"/>--}}
    {{--                    </div>--}}
    {{--                    <div class="text-content">--}}
    {{--                        <h2 class="title">Елена Свищева</h2>--}}
    {{--                        <h2 class="subtitle">Юрист по гражданским и трудовым спорам, медиатор Липецкого областного--}}
    {{--                            суда </h2>--}}
    {{--                        <p>--}}
    {{--                            «Медиация в профсоюзах – как инструмент управления конфликтами».--}}
    {{--                        </p>--}}
    {{--                        <a class="read-btn" href="{{ route('register') }}">--}}
    {{--                            Регистрация <i class="uil uil-arrow-right"></i>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="swiper-slide dark-layer">--}}
    {{--                    <img src="{{asset("front/image/003.JPG")}}"/>--}}
    {{--                    <div class="card">--}}
    {{--                        <img src="{{asset("front/image/1-3.png")}}"/>--}}
    {{--                    </div>--}}
    {{--                    <div class="text-content">--}}
    {{--                        <h2 class="title">Дмитрий Васильев</h2>--}}
    {{--                        <h2 class="subtitle">--}}
    {{--                            Основатель Центра Техносферной Безопасности «ПРОФИ»--}}
    {{--                        </h2>--}}
    {{--                        <p>--}}
    {{--                            «Как устроен мозг, мышление и память. Привычки, желания и зависимости. Эмоциональный--}}
    {{--                            интеллект. Что такое прокрастинация и как с ней бороться. Мастер класс по--}}
    {{--                            нейролингвистическому программированию «ПЕРЕПРОШИВКА МОЗГА».--}}
    {{--                        </p>--}}
    {{--                        <a class="read-btn" href="{{ route('register') }}">--}}
    {{--                            Регистрация <i class="uil uil-arrow-right"></i>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="swiper-slide dark-layer">--}}
    {{--                    <img src="{{asset("front/image/004.JPG")}}"/>--}}
    {{--                    <div class="card">--}}
    {{--                        <img src="{{asset("front/image/1-4.png")}}"/>--}}
    {{--                    </div>--}}
    {{--                    <div class="text-content">--}}
    {{--                        <h2 class="title">Сергей Драндров</h2>--}}
    {{--                        <h2 class="subtitle">Главный редактор «Профсоюз ТВ»</h2>--}}
    {{--                        <p>--}}
    {{--                            «Ораторское искусство: дар или приобретенный навык?»--}}
    {{--                        </p>--}}
    {{--                        <a class="read-btn" href="{{ route('register') }}">--}}
    {{--                            Регистрация <i class="uil uil-arrow-right"></i>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="swiper-button-next"></div>--}}
    {{--            <div class="swiper-button-prev"></div>--}}
    {{--            <div class="autoplay-progress">--}}
    {{--                <svg viewBox="0 0 48 48">--}}
    {{--                    <circle cx="24" cy="24" r="20"></circle>--}}
    {{--                </svg>--}}
    {{--                <span></span>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="bg-slider-thumbs">--}}
    {{--            <div class="swiper-wrapper thumbs-container">--}}
    {{--                <img src="{{asset("front/image/films_puzzl.jpg")}}" alt="" class="swiper-slide">--}}
    {{--                <img src="{{asset("front/image/001.JPG")}}" alt="" class="swiper-slide">--}}
    {{--                <img src="{{asset("front/image/002.JPG")}}" alt="" class="swiper-slide">--}}
    {{--                <img src="{{asset("front/image/003.JPG")}}" alt="" class="swiper-slide">--}}
    {{--                <img src="{{asset("front/image/004.JPG")}}" alt="" class="swiper-slide">--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}


    <div class="bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center">
                Приветствие участникам семинара-совещания
            </h2>
            {{--            <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>--}}
            <p class="mt-4 pt-2">
                {!! $Event->video_code !!}
            </p>
            <figcaption class="mt-4 flex gap-x-2 text-lg leading-6 text-gray-500">
                <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20"
                     fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                          clip-rule="evenodd"/>
                </svg>
                Председатель Профсоюза Офицеров Ю.Б
            </figcaption>
        </div>
    </div>

    @include('livewire.layout.line')

    <section class="">
        {{--  Речь начало --}}
        @if($Greetings)
            @foreach($Greetings as $Greeting)
                <div class="bg-white px-6 py-12 lg:px-8">
                    <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
                        <div class="mt-4 max-w-3xl">
                            <h2 class="text-4xl font-bold tracking-tight text-gray-900 text-center">
                                {{ $Greeting->greetings_title }}
                            </h2>
                            <div class="mt-6 text-justify pt-4 text-xl">
                                {!! $Greeting->greetings_text !!}
                            </div>
                        </div>
                        <figure class="pt-10">
                            <img class="aspect-video rounded-xl bg-gray-50 object-cover"
                                 src="{{ asset('storage/'.$Greeting->greetings_image ) }}"
                                 alt="">
                            <figcaption class="mt-4 flex gap-x-2 text-lg leading-6 text-gray-500">
                                <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20"
                                     fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                          clip-rule="evenodd"/>
                                </svg>
                                {{ $Greeting->greetings_image_description  }}
                            </figcaption>
                        </figure>
                    </div>
                </div>
                @include('livewire.layout.line')
            @endforeach
        @endif
        {{--  Речь конец --}}
    </section>


    <section class="">

        {{--  Гости мепроприяия начало  --}}
        <div id="guest" class="bg-white py-20 sm:py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl sm:text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                        Гости мероприятия
                    </h2>

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
                                    <h3 class="text-2xl font-semibold leading-8 tracking-tight text-gray-900">
                                        {{$Guest->last_name }} {{$Guest->first_name }} {{$Guest->middle_name }}
                                    </h3>
                                    <p class="text-lg leading-7 text-gray-600">{{$Guest->job_title}}</p>

                                </div>
                            </li>
                        @endforeach
                    @endif

                    <!-- More people... -->
                </ul>
            </div>
        </div>
        {{--  Гости мепроприяия конец  --}}


    </section>

    @include('livewire.layout.line')


    {{--    <section class="about section">--}}
    {{--        @if($Schedules->isNotEmpty())--}}
    {{--            <x-filament::tabs label="Content tabs">--}}
    {{--                @foreach($Schedules as $key => $Schedule)--}}
    {{--                    <x-filament::tabs.item>--}}
    {{--                        {{ $Schedule->alt_data }}--}}
    {{--                    </x-filament::tabs.item>--}}
    {{--                @endforeach--}}
    {{--            </x-filament::tabs>--}}
    {{--        @endif--}}
    {{--    </section>--}}


    {{--    <section class="">--}}
    {{--        --}}{{--  Жюри начало --}}
    {{--        <div id="moderators" class="bg-white py-20 md:py-20">--}}
    {{--            <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-5">--}}
    {{--                <div class="max-w-2xl xl:col-span-2 grid justify-items-center">--}}
    {{--                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">--}}
    {{--                        Модераторы слета--}}
    {{--                    </h2>--}}
    {{--                    <img src="{{asset("front/image/Slet_Logo.png")}}"--}}
    {{--                         class="h-80">--}}
    {{--                </div>--}}
    {{--                <ul role="list" class="-mt-12 space-y-12 divide-y divide-gray-200 xl:col-span-3">--}}
    {{--                    @if($Moderators)--}}
    {{--                        @foreach($Moderators as $Moderator)--}}
    {{--                            <li class="flex flex-col gap-10 pt-12 sm:flex-row">--}}
    {{--                                <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"--}}
    {{--                                     src="{{ asset('storage/'.$Moderator->image) }}"--}}
    {{--                                     alt="">--}}
    {{--                                <div class="max-w-xl flex-auto">--}}
    {{--                                    <h3 class="text-2xl font-semibold leading-8 tracking-tight text-gray-900">{{$Moderator->last_name }} {{$Moderator->first_name  }} {{$Moderator->middle_name  }}</h3>--}}
    {{--                                    <p class="text-lg leading-7 text-gray-600">{{$Moderator->job_title  }}</p>--}}
    {{--                                    <p class="mt-6 text-base leading-7 text-gray-600">--}}
    {{--                                        {!! $Moderator->description !!}--}}
    {{--                                    </p>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                        @endforeach--}}
    {{--                    @endif--}}
    {{--                    <!-- More people... -->--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        --}}{{--  Жюри конец --}}
    {{--    </section>--}}

    {{--    @include('livewire.layout.line')--}}


    <section class="" id="timeline">

        <div class="bg-white px-6 py-12 lg:px-8">
            <div class="mx-auto max-w-6xl text-base leading-7 text-gray-700">
                <div class="mt-4 max-w-6xl">
                    <h2 class="text-4xl font-bold tracking-tight text-gray-900 text-center py-12">
                        Расписание мероприятия
                    </h2>
                </div>


                @if($Schedules)
                    <div x-data="{ tab: 'tab1' }"
                         class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">


                        <x-filament::tabs
                            label="Content tabs" class="isolate flex divide-x divide-gray-200 rounded-lg shadow"
                            aria-label="Tabs">

                            @foreach($Schedules as $key => $Schedule)

                                <a @click="tab = 'tab{{$key+1}}'" :alpine-active="'tab === \'tab{{$key+1}}\''"
                                   class="cursor-pointer text-gray-700 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-center text-base font-medium hover:bg-gray-50 focus:z-10"
                                   aria-current="page">
                            <span>
                                {{ $Schedule->alt_data }}
                                <br>
                                {{ $Schedule->week }}
                            </span>

                                    <span class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>

                                    <span x-show="tab === 'tab{{$key+1}}'"
                                          class="bg-indigo-500 absolute inset-x-0 bottom-0 h-0.5"></span>

                                </a>

                            @endforeach

                        </x-filament::tabs>


                        @foreach($Schedules as $key => $Schedule)
                            <div class="relative mt-2 ml-10 col-span-12 px-4 space-y-6 sm:col-span-9">
                                <div
                                    class="col-span-12 space-y-12 relative px-4 sm:col-span-8 sm:space-y-8 sm:before:absolute sm:before:top-2 sm:before:bottom-0 sm:before:w-0.5 sm:before:-left-3 before:bg-gray-300">
                                    @foreach($Timeline as $Time)

                                        @if($Schedule->id == $Time->event_schedules_id)
                                            <div x-show="tab === 'tab{{$key+1}}'"
                                                 class="flex flex-col space-y-0 sm:relative sm:before:absolute sm:before:top-2 sm:before:w-4 sm:before:h-4 sm:before:rounded-full sm:before:left-[-35px] sm:before:z-[1] before:bg-teal-600">

                                                <h3 class="text-lg tracking-wide uppercase">
                                                    <img class="inline-block h-12 w-12 rounded-md m-2"
                                                         src="{{ asset('storage/'.$Time->image) }}"
                                                         alt="">

                                                    <i class="uil uil-clock-nine h-16 w-16"></i>
                                                    {{ $Time->time }}


                                                    {{--                                                    <i class="uil uil-location-point h-16 w-16"></i>--}}
                                                    {{--                                                    {{ $Time->place }}--}}

                                                </h3>
                                                <h3 class="text-lg tracking-wide">
                                                    {{ $Time->title }}
                                                </h3>
                                                <h3 class="text-base tracking-wide">
                                                    {!! $Time->description  !!}
                                                </h3>
                                            </div>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>


    </section>

    @include('livewire.layout.line')

    <div id="documents" class="bg-white px-6 py-2 lg:px-8">
        <div class="mx-auto max-w-6xl text-base leading-7 text-gray-700">
            <div class="mt-4 max-w-6xl">
                <h2 class="text-4xl font-bold tracking-tight text-gray-900 text-center py-12">
                    Документы семинара-совещания
                </h2>
            </div>
            {{--            @dd($Moderators)--}}
            @if($Documents)
                <!-- Created By Joker Banny -->
                <div class="flex py-12 items-center justify-center bg-white px-6 md:px-6">
                    <div class="space-y-6 border-l-2 border-dashed">
                        @foreach($Documents as $key => $Document)
                            <div class="relative w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="absolute -top-0.5 z-10 -ml-3.5 h-7 w-7 rounded-full text-emerald-700">
                                    <path fill-rule="evenodd"
                                          d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <div class="ml-6">
                                    <h3 class=" text-xl text-gray-900">{{ $key+1 }}. {{ $Document->doc_name }}</h3>
                                    <h3 class=" text-xl text-gray-900 pt-2 pl-3">Скачать документ</h3>
                                    <div class="flex gap-2 items-center pt-2 pl-3">
                                        @if($Document->doc_file)
                                            <a target="_blank" href="{{ asset('storage/'.$Document->doc_file) }}"
                                               class="mt-1 text-6xl font-extrabold text-blue-600">
                                                <img src="{{ asset('front/img/PDF_file_icon.svg.png') }}" alt=""
                                                     class="h-11">
                                            </a>
                                        @endif

                                        @if($Document->docx_file)
{{--                                            <span class="px-2 text-lg text-blue-900"></span>--}}
                                            <a target="_blank" href="{{ asset('storage/'.$Document->docx_file) }}"
                                               class="mt-1 text-lg font-semibold text-blue-600">
                                                <img src="{{ asset('front/img/docx_icon.svg.png') }}" alt=""
                                                     class="h-12">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('livewire.layout.line')

    {{--    <section class="about section">--}}
    <!-- Contact -->
    <div id="contact" class="max-w-7xl px-4 lg:px-6 lg:px-8 py-12 lg:py-20 mx-auto bg-white">
        <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Контакты
            </h2>
        </div>
        @if($Adress)
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
                <div
                    class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl border border-b-gray-400 dark:bg-neutral-800">
                    {!! $Adress->map_code !!}
                </div>
                <!-- End Col -->

                <div class="space-y-8 lg:space-y-16">
                    <div>
                        <h3 class="mb-5 text-xl  font-semibold text-black dark:text-white">
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
                                    <p class="text-xl text-gray-600 dark:text-neutral-900">
                                        {{ $Adress->city }}
                                    </p>
                                    <address class="mt-1 text-lg text-black not-italic dark:text-white">
                                        {{ $Adress->adress }}
                                    </address>
                                </div>
                            </div>
                        </div>
                        <!-- End Grid -->
                    </div>

                    <div>
                        <h3 class="mb-5 text-xl font-semibold text-black dark:text-white">
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
                                    <p class="text-lg">
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
        @endif
    </div>
    <!-- End Contact -->


    {{--  Кнопка вверх начало --}}
    <button id="to-top-button" onclick="goToTop()" title="Go To Top"
            class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-teal-600 hover:bg-teal-700 text-white text-lg font-semibold transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z"/>
        </svg>
        <span class="sr-only">Go to top</span>
    </button>
    {{--  Кнопка вверх конец --}}


    <script>
        // Get the 'to top' button element by ID
        var toTopButton = document.getElementById("to-top-button");

        // Check if the button exists
        if (toTopButton) {

            // On scroll event, toggle button visibility based on scroll position
            window.onscroll = function () {
                if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                    toTopButton.classList.remove("hidden");
                } else {
                    toTopButton.classList.add("hidden");
                }
            };

            // Function to scroll to the top of the page smoothly
            window.goToTop = function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };
        }
    </script>


</div>
