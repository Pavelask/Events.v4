<?php

namespace App\Filament\Resources\EventModeratorsResource\Pages;

use App\Filament\Resources\EventModeratorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventModerators extends ViewRecord
{
    protected static string $resource = EventModeratorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
