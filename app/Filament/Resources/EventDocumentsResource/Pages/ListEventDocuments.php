<?php

namespace App\Filament\Resources\EventDocumentsResource\Pages;

use App\Filament\Resources\EventDocumentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventDocuments extends ListRecords
{
    protected static string $resource = EventDocumentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
