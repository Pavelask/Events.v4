<?php

namespace App\Filament\Clusters\Program\Resources\EventSchedulesResource\Pages;

use App\Filament\Clusters\Program\Resources\EventSchedulesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventSchedules extends ViewRecord
{
    protected static string $resource = EventSchedulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
