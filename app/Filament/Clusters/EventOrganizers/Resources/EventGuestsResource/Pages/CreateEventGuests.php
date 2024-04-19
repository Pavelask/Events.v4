<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages;

use App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEventGuests extends CreateRecord
{
    protected static string $resource = EventGuestsResource::class;
}
