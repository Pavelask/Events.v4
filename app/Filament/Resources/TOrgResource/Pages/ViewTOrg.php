<?php

namespace App\Filament\Resources\TOrgResource\Pages;

use App\Filament\Resources\TOrgResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTOrg extends ViewRecord
{
    protected static string $resource = TOrgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
