<?php

namespace App\Filament\Resources\EventImagesResource\Pages;

use App\Filament\Resources\EventImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventImages extends ListRecords
{
    protected static string $resource = EventImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
