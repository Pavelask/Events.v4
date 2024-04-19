<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventGuests extends ListRecords
{
    protected static string $resource = EventGuestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
