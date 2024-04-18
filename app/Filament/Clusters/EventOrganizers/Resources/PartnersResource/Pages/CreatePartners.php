<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\PartnersResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\PartnersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePartners extends CreateRecord
{
    protected static string $resource = PartnersResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
