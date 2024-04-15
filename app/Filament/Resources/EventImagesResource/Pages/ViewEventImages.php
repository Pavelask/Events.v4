<?php

namespace App\Filament\Resources\EventImagesResource\Pages;

use App\Filament\Resources\EventImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventImages extends ViewRecord
{
    protected static string $resource = EventImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
