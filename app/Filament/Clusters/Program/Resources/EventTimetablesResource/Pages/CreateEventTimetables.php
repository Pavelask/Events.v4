<?php

namespace App\Filament\Clusters\Program\Resources\EventTimetablesResource\Pages;

use App\Filament\Clusters\Program\Resources\EventTimetablesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventTimetables extends CreateRecord
{
    protected static string $resource = EventTimetablesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
