<?php

namespace App\Filament\Resources\EventGuestsTagsResource\Pages;

use App\Filament\Resources\EventGuestsTagsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventGuestsTags extends ListRecords
{
    protected static string $resource = EventGuestsTagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
