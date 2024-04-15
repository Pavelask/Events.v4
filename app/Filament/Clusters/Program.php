<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Program extends Cluster
{
    protected static ?string $navigationLabel = 'Расписание';

    protected static ?string $modelLabel = 'Расписание';
//
    protected static ?string $pluralModelLabel = 'Расписание';
    protected static ?string $pluralLabel = 'Расписание';

//
    protected static ?string $navigationGroup = 'Настройки мероприятия';

//    protected static ?string $navigationParentItem = 'Настройки мероприятия';


    protected static ?int $navigationSort = 2000;

    protected static ?string $navigationIcon = 'heroicon-c-calendar-days';
//    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
}
