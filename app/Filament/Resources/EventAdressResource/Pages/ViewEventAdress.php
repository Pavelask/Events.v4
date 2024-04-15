<?php

namespace App\Filament\Resources\EventAdressResource\Pages;

use App\Filament\Resources\EventAdressResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventAdress extends ViewRecord
{
    protected static string $resource = EventAdressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
