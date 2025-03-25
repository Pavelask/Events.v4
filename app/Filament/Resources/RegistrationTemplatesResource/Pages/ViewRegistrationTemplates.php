<?php

namespace App\Filament\Resources\RegistrationTemplatesResource\Pages;

use App\Filament\Resources\RegistrationTemplatesResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewRegistrationTemplates extends ViewRecord
{
    protected static string $resource = RegistrationTemplatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Незад')
                ->url(static::getResource()::getUrl())
                ->button()
                ->icon('heroicon-o-chevron-left')
                ->color('gray'),
            Actions\EditAction::make(),
        ];
    }
}
