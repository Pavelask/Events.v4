<?php

namespace App\Filament\Clusters\Program\Resources;

use App\Filament\Clusters\Program;
use App\Filament\Clusters\Program\Resources\EventSchedulesResource\RelationManagers\GetSchedulesRelationManager;
use App\Filament\Clusters\Program\Resources\EventTimetablesResource\Pages;
use App\Filament\Clusters\Program\Resources\EventTimetablesResource\RelationManagers;
use App\Models\Events;
use App\Models\EventSchedules;
use App\Models\EventTimetables;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class EventTimetablesResource extends Resource
{
    protected static ?string $model = EventTimetables::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Program::class;

    protected static ?string $modelLabel = 'Расписание';
//
    protected static ?string $pluralModelLabel = 'Расписание';
    protected static ?string $navigationLabel = 'Расписание';

    protected static ?string $navigationParentItem = 'Календарь';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Список заполненых дат')
                    ->icon('heroicon-m-calendar-days')
                    ->description('')
                    ->schema([
                        Forms\Components\Select::make('event_id')
                            ->required()
                            ->label('Список активных мероприятий')
                            ->relationship(name: 'eventTimetable', titleAttribute: 'name')
                            ->live()
                            ->columnSpan(3),

                        Forms\Components\Select::make('event_schedules_id')
                            ->label('Список дат')
                            ->required()
                            ->options(fn(Get $get): Collection => EventSchedules::query()
                                ->where('events_id', $get('event_id'))
                                ->pluck('alt_data', 'id')),

                    ])->columnSpanFull()->columns(4),
                Forms\Components\Section::make('Расписание на день')
                    ->icon('heroicon-o-calendar')
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('time')
                            ->label('Время')
                            ->columnSpan(1)
                            ->required(),
                        Forms\Components\TextInput::make('place')
                            ->label('Место')
                            ->columnSpan(2)
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->label('Название')
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->imageEditor()
                            ->columnSpan(1),
                        Forms\Components\RichEditor::make('description')
                            ->label('Описание')
                            ->columnSpan(2),
                        Forms\Components\Toggle::make('is_visible')
                            ->label('Показывать на сайте')
                            ->inline(false)
                            ->required(),
                        Forms\Components\TextInput::make('sort')
                            ->label('Сортировка')
                            ->default(500),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Расписание')
            ->description('Расписание мероприятий по дням проведения')
            ->columns([

                Tables\Columns\Layout\Split::make([

                    ImageColumn::make('image')
                        ->circular()
                        ->grow(false)
                        ->alignCenter()
                        ->defaultImageUrl(url('storage/img/no-photography-icon.png')),
                    Tables\Columns\TextColumn::make('scheduleTable.date')
                        ->grow(false)
                        ->dateTime('d M Y')
                        ->weight(FontWeight::Bold)
                        ->sortable()
                        ->label('Дата'),


                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('time')
                            ->grow(false)
                            ->width(10)
                            ->icon('heroicon-o-clock')
                            ->label('Время'),
                        Tables\Columns\TextColumn::make('place')
                            ->grow(false)
                            ->width(10)
                            ->icon('heroicon-c-map-pin')
                            ->wrap()
                            ->label('Место'),
                    ])->alignLeft(),

                    Tables\Columns\TextColumn::make('title')
                        ->grow(true)
                        ->width('100%')
                        ->weight(FontWeight::Bold)
//                        ->wrap()
                        ->label('Название'),


//                    Tables\Columns\TextInputColumn::make('sort')
//                        ->width(40)
//                        ->label('SORT'),

//                    Tables\Columns\ToggleColumn::make('is_visible')
//                        ->label('OFF|ON')
//                        ->onColor('success')
//                        ->offColor('danger')
//                        ->onIcon('heroicon-s-eye')
//                        ->offIcon('heroicon-s-eye-slash')
//                        ->alignCenter(),

                ])->from('md'),
            ])
            ->defaultSort('scheduleTable.date', 'desc')
            ->paginated([25, 50, 75, 'all'])
            ->defaultPaginationPageOption(25)
            ->filters([
                Filter::make('events')
                    ->form([
                        Forms\Components\Select::make('event_id')
                            ->required()
                            ->label('Список активных мероприятий')
//                            ->relationship(name: 'eventTimetable', titleAttribute: 'name')
                            ->options(
                                Events::all()->pluck('name', 'id')
//                                Events::where('event_status', 'active')->pluck('name', 'id')
                            )->live()
                            ->columnSpan(3),

                        Forms\Components\Select::make('event_schedules_id')
                            ->label('Выбирете день')
                            ->required()
                            ->options(fn(Get $get): Collection => EventSchedules::query()
                                ->where('events_id', $get('event_id'))
                                ->pluck('alt_data', 'id')),
                    ])
                    ->columnSpanFull()
                    ->columns(4)
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['event_id'],
                                fn(Builder $query, $date): Builder => $query->where('event_id', '=', $date),
                            )
                            ->when(
                                $data['event_schedules_id'],
                                fn(Builder $query, $date): Builder => $query->where('event_schedules_id', '=', $date),
                            );
                    })

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
                            ->relationship('eventTimetable')
                            ->schema([
                                TextEntry::make('name')
                                    ->icon('heroicon-s-cake')
                                    ->iconColor('primary')
                                    ->size(TextEntry\TextEntrySize::Large)
                                    ->weight(FontWeight::Bold)
                                    ->color('primary')
                                    ->label('')
                                    ->columnSpanFull(),
                            ]),
                        TextEntry::make('scheduleTable.date')
                            ->label('Дата'),
                        TextEntry::make('scheduleTable.week')
                            ->label('День недели'),
                        TextEntry::make('scheduleTable.alt_data')
                            ->label('Дата для сайта'),
                    ])->columns(3),

                Section::make('Данные')
                    ->schema([
                        TextEntry::make('time')
                            ->maxWidth(100)
                            ->label('Время'),
                        TextEntry::make('place')
                            ->label('Место')
                            ->columnSpan(2),
                        TextEntry::make('title')
                            ->label('Название'),
                        ImageEntry::make('image')
                            ->label('Изображение'),
                        TextEntry::make('description')
                            ->label('Описание')
                            ->markdown()
                            ->columnSpan(3),
                    ])->columns(4),

                Section::make('Данные')
                    ->schema([
                        IconEntry::make('is_visible')
                            ->maxWidth(100)
                            ->boolean()
                            ->label('ВКЛ/ВЫКЛ'),
                        TextEntry::make('sort')
                            ->label('Сортировка'),
                    ])->columns(3),
            ]);
    }

    public static function getRelations(): array
    {
        return [
//           GetSchedulesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventTimetables::route('/'),
            'create' => Pages\CreateEventTimetables::route('/create'),
            'view' => Pages\ViewEventTimetables::route('/{record}'),
            'edit' => Pages\EditEventTimetables::route('/{record}/edit'),
        ];
    }
}
