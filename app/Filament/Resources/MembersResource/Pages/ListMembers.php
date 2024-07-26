<?php

namespace App\Filament\Resources\MembersResource\Pages;

use App\Filament\Resources\MembersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;


class ListMembers extends ListRecords
{
    protected static string $resource = MembersResource::class;

    public function getTabs(): array
    {
        return [
            'today' => Tab::make('За сегодня')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at', '=', now()->subDay())),
            'week' => Tab::make('За неделю')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at', '=', now()->subWeek())),
            'months' => Tab::make('За месяц')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at', '=', now()->subMonths())),
            'year' => Tab::make('За год')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('created_at', '=', now()->subYear())),
            'all' => Tab::make('Все участники'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
