<?php

namespace App\Filament\Clusters\Program\Resources\EventTimetablesResource\Pages;

use App\Filament\Clusters\Program\Resources\EventTimetablesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventTimetables extends EditRecord
{
    protected static string $resource = EventTimetablesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
