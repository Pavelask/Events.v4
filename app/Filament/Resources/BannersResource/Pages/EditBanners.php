<?php

namespace App\Filament\Resources\BannersResource\Pages;

use App\Filament\Resources\BannersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBanners extends EditRecord
{
    protected static string $resource = BannersResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
