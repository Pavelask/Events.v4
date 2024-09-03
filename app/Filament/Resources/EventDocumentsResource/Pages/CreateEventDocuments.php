<?php

namespace App\Filament\Resources\EventDocumentsResource\Pages;

use App\Filament\Resources\EventDocumentsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventDocuments extends CreateRecord
{
    protected static string $resource = EventDocumentsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
