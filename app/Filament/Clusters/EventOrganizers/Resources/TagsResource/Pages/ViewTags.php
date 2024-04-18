<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\TagsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\TagsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTags extends ViewRecord
{
    protected static string $resource = TagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
