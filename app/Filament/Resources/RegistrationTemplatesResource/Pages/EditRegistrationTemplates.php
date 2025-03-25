<?php

namespace App\Filament\Resources\RegistrationTemplatesResource\Pages;

use App\Filament\Resources\RegistrationTemplatesResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditRegistrationTemplates extends EditRecord
{
    protected static string $resource = RegistrationTemplatesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Назад')
                ->url(static::getResource()::getUrl())
                ->button()
                ->icon('heroicon-o-chevron-left')
                ->color('gray'),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
