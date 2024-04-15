<?php

namespace App\Filament\Clusters\Program\Resources\EventTimetablesResource\Pages;

use App\Filament\Clusters\Program\Resources\EventTimetablesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventTimetables extends ListRecords
{
    protected static string $resource = EventTimetablesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
