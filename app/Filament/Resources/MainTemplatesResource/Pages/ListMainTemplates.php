<?php

namespace App\Filament\Resources\MainTemplatesResource\Pages;

use App\Filament\Resources\MainTemplatesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMainTemplates extends ListRecords
{
    protected static string $resource = MainTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
