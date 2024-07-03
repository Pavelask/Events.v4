<?php

namespace App\Filament\Resources\TOrgResource\Pages;

use App\Filament\Resources\TOrgResource;
use App\Models\tOrg;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\DB;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;


class ListTOrgs extends ListRecords
{
    protected static string $resource = TOrgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
//                ->uniqueField('id')
                ->massCreate(false)
                ->fields([
                    ImportField::make('name')
                        ->required()
                        ->label('Название организации'),
                    ImportField::make('code')
                        ->required()
                        ->label('Код организации'),
                ])
                ->label('Загрузить из CSV'),
//                ->modalHeading('Если данные уже загружены, загрузите только новые данные')
//                ->modalDescription('Данные из таблицы будут удалены окончательно!'),
            Action::make('delete')
                ->label('Очистить таблицу')
                ->requiresConfirmation()
                ->color('danger')
                ->modalIcon('heroicon-o-trash')
                ->modalIconColor('warning')
                ->modalHeading('Удалить все данные из таблицы?')
                ->modalDescription('Данные из таблицы будут удалены окончательно!')
                ->modalSubmitActionLabel('Да, удаляем все')
                ->action(function () {
                    DB::table('t_orgs')->truncate();
                })
        ];
    }
}
