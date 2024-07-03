<?php

namespace App\Filament\Resources\TOrgResource\Pages;

use App\Filament\Resources\TOrgResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTOrg extends EditRecord
{
    protected static string $resource = TOrgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
