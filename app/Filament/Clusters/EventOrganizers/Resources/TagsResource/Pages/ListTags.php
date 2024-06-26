<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\TagsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\TagsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTags extends ListRecords
{
    protected static string $resource = TagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
