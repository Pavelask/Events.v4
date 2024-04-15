<?php

namespace App\Filament\Clusters\Program\Resources\EventTimetablesResource\Pages;

use App\Filament\Clusters\Program\Resources\EventTimetablesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventTimetables extends ViewRecord
{
    protected static string $resource = EventTimetablesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
