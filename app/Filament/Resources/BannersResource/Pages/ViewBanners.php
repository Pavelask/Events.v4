<?php

namespace App\Filament\Resources\BannersResource\Pages;

use App\Filament\Resources\BannersResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBanners extends ViewRecord
{
    protected static string $resource = BannersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
