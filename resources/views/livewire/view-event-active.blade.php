<div>
    {{-- In work, do what you enjoy. --}}
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <span class="text-xs text-gray-900">
            {{ $Event->id }}
        </span>


        <div class="bg-gray-50 px-6 py-2 sm:px-6 sm:py-20 lg:px-8 rounded-md shadow-md border border-gray-100">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="text-sm uppercase font-bold tracking-tight text-gray-900 sm:text-lg">
                    {{ $Event->name }}
                </h2>
                <h2 class="mx-auto mt-6 text-lg uppercase font-bold leading-8 text-gray-400">
                    {{ $Event->fulldate }}
                </h2>
                @if($Adress)
                <h2 class="mx-auto text-lg up font-bold leading-8 text-gray-300">
                    {{ $Adress->city }}, {{ $Adress->adress }}
                </h2>
                @endif
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    @if(!$Member)
                        <a href="{{ route('MemberCreate') }}"
                           class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Регистрация
                        </a>
                    @else
                        <a href="{{ route('MemberEdit', ['record' => $Member->id] ) }}"
                           class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Редактировать анкету
                        </a>
                    @endif

                    <a href="{{ route('IndexSite') }}" class="text-sm font-semibold leading-6 text-gray-900">
                        Подробнее <span aria-hidden="true">→</span></a>
                </div>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    @if($Event->qrpictures)
                        <img class="inline-block rounded-md h-60"
                             src="{{ asset('storage/'.$Event->qrpictures) }}"
                             alt="">
                    @endif
                </div>
            </div>
        </div>


    </div>

</div>
