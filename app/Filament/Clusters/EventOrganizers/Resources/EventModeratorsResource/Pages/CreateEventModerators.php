<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\EventModeratorsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\EventModeratorsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEventModerators extends CreateRecord
{
    protected static string $resource = EventModeratorsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
