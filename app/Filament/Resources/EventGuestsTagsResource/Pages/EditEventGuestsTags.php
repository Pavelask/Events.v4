<?php

namespace App\Filament\Resources\EventGuestsTagsResource\Pages;

use App\Filament\Resources\EventGuestsTagsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventGuestsTags extends EditRecord
{
    protected static string $resource = EventGuestsTagsResource::class;

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
