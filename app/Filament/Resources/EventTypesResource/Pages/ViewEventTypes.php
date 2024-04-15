<?php

namespace App\Filament\Resources\EventTypesResource\Pages;

use App\Filament\Resources\EventTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventTypes extends ViewRecord
{
    protected static string $resource = EventTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
