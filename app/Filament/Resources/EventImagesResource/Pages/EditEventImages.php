<?php

namespace App\Filament\Resources\EventImagesResource\Pages;

use App\Filament\Resources\EventImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventImages extends EditRecord
{
    protected static string $resource = EventImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
