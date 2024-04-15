<?php

namespace App\Filament\Resources\EventAdressResource\Pages;

use App\Filament\Resources\EventAdressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventAdress extends EditRecord
{
    protected static string $resource = EventAdressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
