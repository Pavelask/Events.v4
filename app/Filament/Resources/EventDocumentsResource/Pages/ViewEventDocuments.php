<?php

namespace App\Filament\Resources\EventDocumentsResource\Pages;

use App\Filament\Resources\EventDocumentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventDocuments extends ViewRecord
{
    protected static string $resource = EventDocumentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
