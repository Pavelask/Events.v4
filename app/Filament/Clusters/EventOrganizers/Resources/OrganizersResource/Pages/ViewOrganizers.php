<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrganizers extends ViewRecord
{
    protected static string $resource = OrganizersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
