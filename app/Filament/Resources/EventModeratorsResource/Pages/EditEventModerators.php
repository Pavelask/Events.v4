<?php

namespace App\Filament\Resources\EventModeratorsResource\Pages;

use App\Filament\Resources\EventModeratorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventModerators extends EditRecord
{
    protected static string $resource = EventModeratorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
