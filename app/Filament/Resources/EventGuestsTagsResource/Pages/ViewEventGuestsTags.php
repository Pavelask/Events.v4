<?php

namespace App\Filament\Resources\EventGuestsTagsResource\Pages;

use App\Filament\Resources\EventGuestsTagsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventGuestsTags extends ViewRecord
{
    protected static string $resource = EventGuestsTagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
