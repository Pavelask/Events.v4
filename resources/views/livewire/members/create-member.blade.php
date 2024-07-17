<div>
    <div class="p-6 text-gray-900 dark:text-gray-100">
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 my-6 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Submit
        </button>
    </form>
    </div>
    <x-filament-actions::modals />
</div>
