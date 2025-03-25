<?php

namespace App\Filament\Resources\MainTemplatesResource\Pages;

use App\Filament\Resources\MainTemplatesResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateMainTemplates extends CreateRecord
{
    protected static string $resource = MainTemplatesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Незад')
                ->url(static::getResource()::getUrl())
                ->button()
                ->icon('heroicon-o-chevron-left')
                ->color('gray'),
        ];
    }
}
