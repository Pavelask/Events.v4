<?php

namespace App\Filament\Resources\EventDocumentsResource\Pages;

use App\Filament\Resources\EventDocumentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventDocuments extends EditRecord
{
    protected static string $resource = EventDocumentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
