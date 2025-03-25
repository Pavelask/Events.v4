<?php

namespace App\Filament\Clusters\Program\Resources;

use App\Filament\Clusters\Program;
use App\Filament\Clusters\Program\Resources\EventSchedulesResource\Pages;
use App\Filament\Clusters\Program\Resources\EventSchedulesResource\RelationManagers;
use App\Filament\Clusters\Program\Resources\EventTimetablesResource\RelationManagers\TimetableRelationManager;
use App\Models\EventSchedules;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventSchedulesResource extends Resource
{
    protected static ?string $model = EventSchedules::class;

    protected static ?string $cluster = Program::class;

    protected static ?string $modelLabel = 'Календарь';

    protected static ?string $pluralModelLabel = 'Календарь';
    protected static ?string $navigationLabel = 'Календарь';

    protected static ?string $navigationParentItem = 'Календарь';

    protected static ?string $navigationIcon = 'heroicon-s-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Список активных мероприятий')
                    ->icon('heroicon-s-rectangle-group')
                    ->description('Выбирите мероприятие из выпадающего списка на котором пристуствует гость')->schema([
                        Forms\Components\Select::make('events_id')
                            ->label('Список мероприятий')
                            ->relationship(name: 'event', titleAttribute: 'name')
                            ->columnSpanFull()
                            ->native()
                            ->required(),
                    ]),
                Forms\Components\Section::make('День расписания')
                    ->icon('heroicon-o-globe-asia-australia')
                    ->description('Укажите дату, день недли и альтернативную дату для сайта ( 21 марта 2024)')->schema([
                        Forms\Components\DatePicker::make('date')
                            ->label('Дата'),
                        Forms\Components\TextInput::make('week')
                            ->label('День недели'),
                        Forms\Components\TextInput::make('alt_data')
                            ->label('Альтернативная дата'),
                    ])->columns(3),
                Forms\Components\Section::make([
                    Forms\Components\RichEditor::make('description')
                        ->label('Описание')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('sort')
                        ->label('Сортировка')
                        ->required()
                        ->default(500),
                ])->grow(false),
                Forms\Components\Section::make([
                    Forms\Components\Toggle::make('is_visible')
                        ->label('Отображать на сайте')
                        ->required(),
                ])->grow(false),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('events_id')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('date')
//                    ->label('Дата'),
                Tables\Columns\TextColumn::make('date')
                    ->label('Дата')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('week')
                    ->label('День недели')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alt_data')
                    ->label('Дата для сайта')
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('sort')
                    ->width(50)
                    ->label('Сортировка'),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('OFF|ON')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-s-eye')
                    ->offIcon('heroicon-s-eye-slash')
                    ->alignCenter(),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
            ])->searchable(false)
            ->filters([
                SelectFilter::make('events_id')
                    ->label('Список активных мероприятий')
                    ->relationship('event', 'name', fn (Builder $query) => $query->where('event_status', 'active'))
//                    ->selectablePlaceholder(false)
                    ->columnSpanFull(),
            ], layout: FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    ReplicateAction::make()->color('info'),
                    DeleteAction::make(),
                ])->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Мероприятияе')
                    ->schema([
                        Grid::make(1)
//                        Fieldset::make('Мероприятияе')
                            ->relationship('event')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('')
                                    ->columnSpanFull(),
                            ]),
                        TextEntry::make('date')
                            ->dateTime('d F Y')
                            ->label('Дата'),
                        TextEntry::make('week')
                            ->label('День недели'),
                        TextEntry::make('alt_data')
                            ->label('Дата для сайта'),
                    ])->columns(3)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TimetableRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventSchedules::route('/'),
            'create' => Pages\CreateEventSchedules::route('/create'),
            'view' => Pages\ViewEventSchedules::route('/{record}'),
            'edit' => Pages\EditEventSchedules::route('/{record}/edit'),
        ];
    }
}
