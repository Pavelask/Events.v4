<?php

namespace App\Filament\Resources\FaqsResource\Pages;

use App\Filament\Resources\FaqsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaqs extends EditRecord
{
    protected static string $resource = FaqsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
