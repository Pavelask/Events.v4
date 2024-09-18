<?php

namespace App\Filament\Resources\EventGreetingsResource\Pages;

use App\Filament\Resources\EventGreetingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventGreetings extends EditRecord
{
    protected static string $resource = EventGreetingsResource::class;

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
