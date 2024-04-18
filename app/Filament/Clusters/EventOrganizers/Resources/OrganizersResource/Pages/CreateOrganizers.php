<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganizers extends CreateRecord
{
    protected static string $resource = OrganizersResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
