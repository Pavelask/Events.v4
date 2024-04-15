<?php

namespace App\Filament\Resources\EventGreetingsResource\Pages;

use App\Filament\Resources\EventGreetingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventGreetings extends ListRecords
{
    protected static string $resource = EventGreetingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
