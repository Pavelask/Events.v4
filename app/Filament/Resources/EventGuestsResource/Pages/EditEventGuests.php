<?php

namespace App\Filament\Resources\EventGuestsResource\Pages;

use App\Filament\Resources\EventGuestsResource;
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
