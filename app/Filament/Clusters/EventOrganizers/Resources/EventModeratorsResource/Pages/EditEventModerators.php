<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\EventModeratorsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\EventModeratorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventModerators extends EditRecord
{
    protected static string $resource = EventModeratorsResource::class;

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
