<?php

namespace App\Filament\Clusters\Program\Resources\EventSchedulesResource\Pages;

use App\Filament\Clusters\Program\Resources\EventSchedulesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventSchedules extends EditRecord
{
    protected static string $resource = EventSchedulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
