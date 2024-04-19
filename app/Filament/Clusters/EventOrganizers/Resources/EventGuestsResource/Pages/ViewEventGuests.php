<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource;
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
