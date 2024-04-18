<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class EventOrganizers extends Cluster
{

    protected static ?string $navigationLabel = 'Организаторы';

    protected static ?string $modelLabel = 'Организаторы';
//
    protected static ?string $pluralModelLabel = 'Организаторы';
    protected static ?string $pluralLabel = 'Организаторы';

//
    protected static ?string $navigationGroup = 'Настройки мероприятия';

//    protected static ?string $navigationParentItem = 'Настройки мероприятия';


    protected static ?int $navigationSort = 2200;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left-ellipsis';
}
