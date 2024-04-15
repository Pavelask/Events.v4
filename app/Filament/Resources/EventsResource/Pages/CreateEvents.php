<?php

namespace App\Filament\Resources\EventsResource\Pages;

use App\Filament\Resources\EventsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvents extends CreateRecord
{
    protected static string $resource = EventsResource::class;

//    protected function getFormActions(): array
//    {
//        return array_merge(parent::getFormActions(), [
//            Actions\Action::make('clear')
//                ->action(function () {
//                    $this->form->fill();
//                })
//        ],
//        );
//    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
