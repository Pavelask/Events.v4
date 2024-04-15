<?php

namespace App\Filament\Resources\EventGreetingsResource\Pages;

use App\Filament\Resources\EventGreetingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventGreetings extends ViewRecord
{
    protected static string $resource = EventGreetingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
