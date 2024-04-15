<?php

namespace App\Filament\Resources\EventStatusesResource\Pages;

use App\Filament\Resources\EventStatusesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventStatuses extends CreateRecord
{
    protected static string $resource = EventStatusesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
