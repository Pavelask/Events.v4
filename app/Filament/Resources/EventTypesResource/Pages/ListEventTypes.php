<?php

namespace App\Filament\Resources\EventTypesResource\Pages;

use App\Filament\Resources\EventTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventTypes extends ListRecords
{
    protected static string $resource = EventTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
