<?php

namespace App\Filament\Resources\EventTypesResource\Pages;

use App\Filament\Resources\EventTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventTypes extends CreateRecord
{
    protected static string $resource = EventTypesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
