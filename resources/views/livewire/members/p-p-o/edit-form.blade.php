<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Анкета участника мероприятия - редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-justify"></p>
                    <form wire:submit="save">
                        {{ $this->form }}

                        <div class="flex items-center justify-self-start gap-x-6">
                            <button type="submit"
                                    class="mt-12 py-2 px-4 bg-green-700 text-white rounded-md">
                                Сохнанить
                            </button>
                            <button type="button" wire:click="cancel"
                                    class="mt-12 py-2 px-4 bg-red-600 text-white rounded-md">
                                Отмена
                            </button>
                        </div>

                    </form>

                    <x-filament-actions::modals/>
                </div>

            </div>
        </div>
    </div>
</div>
