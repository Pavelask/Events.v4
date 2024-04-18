<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizers extends EditRecord
{
    protected static string $resource = OrganizersResource::class;

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
