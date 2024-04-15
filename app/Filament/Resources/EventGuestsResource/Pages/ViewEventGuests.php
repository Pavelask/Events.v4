<?php

namespace App\Filament\Resources\EventGuestsResource\Pages;

use App\Filament\Resources\EventGuestsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventGuests extends ViewRecord
{
    protected static string $resource = EventGuestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
