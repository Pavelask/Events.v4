<?php

namespace App\Filament\Resources\EventGuestsTagsResource\Pages;

use App\Filament\Resources\EventGuestsTagsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventGuestsTags extends CreateRecord
{
    protected static string $resource = EventGuestsTagsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
