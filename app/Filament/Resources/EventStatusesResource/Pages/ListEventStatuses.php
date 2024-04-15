<?php

namespace App\Filament\Resources\EventStatusesResource\Pages;

use App\Filament\Resources\EventStatusesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventStatuses extends ListRecords
{
    protected static string $resource = EventStatusesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
