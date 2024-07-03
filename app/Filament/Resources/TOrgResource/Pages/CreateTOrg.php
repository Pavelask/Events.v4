<?php

namespace App\Filament\Resources\TOrgResource\Pages;

use App\Filament\Resources\TOrgResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTOrg extends CreateRecord
{
    protected static string $resource = TOrgResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
