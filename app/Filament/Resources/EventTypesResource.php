<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventTypesResource\Pages;
use App\Filament\Resources\EventTypesResource\RelationManagers;
use App\Models\event_types;
use App\Models\EventTypes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventTypesResource extends Resource
{
    protected static ?string $model = event_types::class;

    protected static ?int $navigationSort = 80;

    protected static ?string $modelLabel = 'Тип мероприятия';
    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $pluralModelLabel = 'Тип мероприятия';

    protected static ?string $navigationGroup = 'Справочники мероприятия';
    protected static ?string $navigationIcon = 'heroicon-m-megaphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Тип мероприятия')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Абривеатура мероприятия')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Краткое описание типа'),
                Forms\Components\TextInput::make('sort')
                    ->label('Сортировка (по умолчанию 500)')
                    ->required()
                    ->maxLength(255)
                    ->default(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Абривеатура мероприятия')
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('sort')
                    ->label('Сортировка')
                    ->width(100)
                    ->sortable(),
//                Tables\Columns\ToggleColumn::make('is_visible')
//                    ->width(100)
//                    ->label('Вкл/Выкл'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()->color('warning'),
                    Tables\Actions\ViewAction::make()->color('green'),
                    Tables\Actions\ReplicateAction::make()->color('info'),
                ])->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventTypes::route('/'),
            'create' => Pages\CreateEventTypes::route('/create'),
            'view' => Pages\ViewEventTypes::route('/{record}'),
            'edit' => Pages\EditEventTypes::route('/{record}/edit'),
        ];
    }
}
