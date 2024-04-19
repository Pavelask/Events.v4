<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventGuests extends EditRecord
{
    protected static string $resource = EventGuestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
