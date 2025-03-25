<?php

namespace App\Filament\Resources\MainTemplatesResource\Pages;

use App\Filament\Resources\MainTemplatesResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewMainTemplates extends ViewRecord
{
    protected static string $resource = MainTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Назад')
                ->url(static::getResource()::getUrl())
                ->button()
                ->icon('heroicon-o-chevron-left')
                ->color('gray'),
            Actions\EditAction::make(),
        ];
    }
}
