<div>
    <div class="flex items-center justify-center">
        <div class="absolute pt-96">
            <img src="{{ asset('front/img/sova.png') }}" alt="" class="w-96">
        </div>
    </div>
    <div class="grid grid-cols-2 justify-items-center content-center">
        <div class="flex h-screen bg-green-900 w-full">
            <div class="m-auto">
                <h1 class="text-white font-Roboto text-[26em] flex items-center justify-center">
                    {{ $green }}
                </h1>
                <div class="flex">
                    <div class="m-auto">
                        <button wire:click="incrementGreen"
                                class="text-lg text-gray-500 m-2 w-9 h-9 bg-amber-50 rounded">+
                        </button>

                        <button wire:click="decrementGreen"
                                class="text-lg text-gray-500 m-2 w-9 h-9 bg-amber-50 rounded">-
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-red-900 h-screen w-full flex">
            <div class="m-auto">
                <h1 class="text-white font-Roboto text-[26em] flex items-center justify-center">
                    {{ $red }}
                </h1>
                <div class="flex">
                    <div class="m-auto">
                        <div class="">
                            <button wire:click="incrementRed"
                                    class="text-lg text-gray-500 m-2 w-9 h-9 bg-amber-50 rounded">+
                            </button>

                            <button wire:click="decrementRed"
                                    class="text-lg text-gray-500 m-2 w-9 h-9 bg-amber-50 rounded">-
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
