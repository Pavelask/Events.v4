<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\PartnersResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\PartnersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartners extends EditRecord
{
    protected static string $resource = PartnersResource::class;

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
