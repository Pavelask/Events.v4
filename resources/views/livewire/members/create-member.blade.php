<div>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <p class="text-justify"></p>
        <form wire:submit="create">
            {{ $this->form }}
            <div class="mt-6 flex items-center justify-self-start gap-x-6">
                <button type="submit"
                        class="rounded-md bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Сохранить
                </button>
                <button type="button" wire:click="cancel"
                        class="mt-12 py-2 px-4 bg-red-600 text-white rounded-md">
                    Отмена
                </button>
            </div>
        </form>

{{--        <x-filament-actions::modals/>--}}
    </div>
</div>
