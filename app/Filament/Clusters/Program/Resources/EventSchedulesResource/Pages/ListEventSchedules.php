<?php

namespace App\Filament\Clusters\Program\Resources\EventSchedulesResource\Pages;

use App\Filament\Clusters\Program\Resources\EventSchedulesResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListEventSchedules extends ListRecords
{
    protected static string $resource = EventSchedulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

//    public function getTabs(): array
//    {
//        return [
//            'active' => Tab::make('Активные мероприятия')
//                ->icon('heroicon-s-arrow-top-right-on-square')
//                ->modifyQueryUsing(fn (Builder $query) => $query->where('event_status', 'active')),
//            'archive' => Tab::make('Архивные мероприятия')
//                ->icon('heroicon-s-document-arrow-down')
//                ->modifyQueryUsing(fn (Builder $query) => $query->where('event_status', 'archive')),
//            'draft' => Tab::make('Черновики')
//                ->icon('heroicon-o-document-text')
//                ->modifyQueryUsing(fn (Builder $query) => $query->where('event_status', 'draft')),
//            'all' => Tab::make('Все мероприятия')
//                ->icon('heroicon-m-user-group'),
//
//        ];
//    }
}
