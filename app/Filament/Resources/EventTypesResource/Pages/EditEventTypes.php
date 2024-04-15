<?php

namespace App\Filament\Resources\EventTypesResource\Pages;

use App\Filament\Resources\EventTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventTypes extends EditRecord
{
    protected static string $resource = EventTypesResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
