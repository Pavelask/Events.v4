<?php

namespace App\Filament\Resources\RegistrationTemplatesResource\Pages;

use App\Filament\Resources\RegistrationTemplatesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRegistrationTemplates extends CreateRecord
{
    protected static string $resource = RegistrationTemplatesResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
