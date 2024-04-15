<?php

namespace App\Filament\Resources\EventStatusesResource\Pages;

use App\Filament\Resources\EventStatusesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventStatuses extends EditRecord
{
    protected static string $resource = EventStatusesResource::class;
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
