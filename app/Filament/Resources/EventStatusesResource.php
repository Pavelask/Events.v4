<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventStatusesResource\Pages;
use App\Filament\Resources\EventStatusesResource\RelationManagers;
use App\Models\event_status;
use App\Models\EventStatuses;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventStatusesResource extends Resource
{
    protected static ?string $model = event_status::class;

    protected static ?int $navigationSort = 90;

    protected static ?string $modelLabel = 'Статус мероприятия';
    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $pluralModelLabel = 'Статус мероприятия';

    protected static ?string $navigationGroup = 'Справочники мероприятия';
    protected static ?string $navigationIcon = 'heroicon-m-finger-print';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Статус мероприятия')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
//                    ->label('Абривеатура мероприятия')
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
                    ->label('Статус мероприятия')
                    ->alignLeft()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
//                    ->label('Абривеатура мероприятия')
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
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\ReplicateAction::make(),
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
            'index' => Pages\ListEventStatuses::route('/'),
            'create' => Pages\CreateEventStatuses::route('/create'),
            'view' => Pages\ViewEventStatuses::route('/{record}'),
            'edit' => Pages\EditEventStatuses::route('/{record}/edit'),
        ];
    }
}
