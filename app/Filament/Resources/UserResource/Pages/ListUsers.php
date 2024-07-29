<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public function getTabs(): array
    {
        return [
            'today' => Tab::make('За сегодня')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', '>=', now()->subDay()))
                ->badge(User::query()->where('created_at', '>=', now()->subDay())->count()),
            'week' => Tab::make('За неделю')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', '>=', now()->subWeek()))
                ->badge(User::query()->where('created_at', '>=', now()->subWeek())->count()),
            'months' => Tab::make('За месяц')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', '>=', now()->subMonths()))
                ->badge(User::query()->where('created_at', '>=', now()->subMonths())->count()),
            'year' => Tab::make('За год')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('created_at', '>=', now()->subYear()))
                ->badge(User::query()->where('created_at', '>=', now()->subYear())->count()),
            'all' => Tab::make('Все пользователи'),
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
