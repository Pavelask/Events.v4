<?php

namespace App\Filament\Resources\RegistrationTemplatesResource\Pages;

use App\Filament\Resources\RegistrationTemplatesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistrationTemplates extends ListRecords
{
    protected static string $resource = RegistrationTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
