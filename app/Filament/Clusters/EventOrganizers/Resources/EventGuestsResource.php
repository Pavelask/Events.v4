<?php

namespace App\Filament\Clusters\EventOrganizers\Resources;

use App\Filament\Clusters\EventOrganizers;
use App\Filament\Resources\EventGuestsResource\Pages;
use App\Filament\Resources\EventGuestsResource\RelationManagers;
use App\Models\Guests;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EventGuestsResource extends Resource
{
    protected static ?string $model = Guests::class;
    protected static ?int $navigationSort = 40;
    protected static ?string $modelLabel = 'Гостя';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Гости мероприятия';
//    protected static ?string $navigationGroup = 'Настройки мероприятия';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $cluster = EventOrganizers::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Список мероприятий')
                    ->description('Выбирите мероприятие из выпадающего списка на котором пристуствует гость')->schema([
                        Forms\Components\Select::make('events_id')
                            ->label('Список активных мероприятий')
                            ->relationship(name: 'event', titleAttribute: 'name')
                            ->columnSpanFull()
                            ->required(),
                    ]),
                Forms\Components\Section::make('ФИО и должность')
                    ->description('')->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->label('Имя')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('middle_name')
                            ->label('Отчество')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->label('Фамилия')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('job_title')
                            ->label('Должность')
                            ->maxLength(255)->columnSpanFull(),
                    ])->columns(3),

                Forms\Components\Section::make('Фото гостя и краткое описание деятельностиь')
                    ->description('')->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Фото')
                            ->image()
                            ->imageEditor(),
                        Forms\Components\RichEditor::make('description')
                            ->label('О госте')
                            ->columnSpan(2),
                    ])->columns(3),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Отображать на сайте')
                    ->required(),

                Forms\Components\TextInput::make('guests_sort')
                    ->label('Сортировка')
                    ->required()
                    ->maxLength(255)
                    ->default(500),

    //                Forms\Components\Select::make('tags')
    ////                    ->relationship('GuestsTags', 'name')
    ////                    ->searchable()
    //                    ->label('TAG')
    //                    ->options(EventGuestsTags::all()->pluck('name', 'slug'))
    //                    ->createOptionForm([
    //                        Forms\Components\TextInput::make('name')
    ////                            ->live(debounce: 500)
    ////                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
    //                            ->label('Название тега')
    //                            ->required()
    //                            ->maxLength(255),
    //                        Forms\Components\TextInput::make('slug')
    //                            ->label('Тег')
    //                            ->required()
    //                            ->maxLength(255),
    //                        Forms\Components\TextInput::make('tags_sort')
    //                            ->label('Сортировка')
    //                            ->required()
    //                            ->maxLength(255)
    //                            ->default(500),
    //                        Forms\Components\Toggle::make('is_visible')
    //                            ->label('ВКЛ/ВЫКЛ')
    //                            ->required(),
    //                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Автарка'),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Фамилия')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('job_title')
//                    ->label('Должность')
//                    ->searchable(),
                Tables\Columns\TextInputColumn::make('guests_sort')
                    ->label('Сортировка')
                    ->width(100)
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('OFF|ON')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-s-eye')
                    ->offIcon('heroicon-s-eye-slash')
                    ->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('events_id')
                    ->label('Список активных мероприятий')
                    ->relationship(name: 'event', titleAttribute: 'name')
                    ->columnSpanFull(),
            ], layout: FiltersLayout::AboveContent)
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
                                    ->columnSpanFull()
                                    ->size(TextEntry\TextEntrySize::Medium)
                                    ->weight(FontWeight::Bold),
                            ]),
                    ]),
                Section::make('ФИО и должность')
                    ->schema([
                        TextEntry::make('first_name')
                            ->label('Имя'),
                        TextEntry::make('middle_name')
                            ->label('Отчество'),
                        TextEntry::make('last_name')
                            ->label('Фамилия'),
                        TextEntry::make('job_title')
                            ->label('Должность')
                            ->columnSpanFull(),
                    ])->columns(3),
                Section::make('Фото гостя и краткое описание')
                    ->schema([
                        ImageEntry::make('image')
                            ->height(200)
                            ->circular()
                            ->label('Автарка')->alignCenter()
                            ->columns(1),
                        TextEntry::make('description')
                            ->label('Описание')
                            ->html()
                            ->columnSpan(2),
                    ])->columns(3),
                Section::make('Настройки')
                    ->schema([
                        TextEntry::make('guests_sort')
                            ->label('Сортировка'),
                        IconEntry::make('is_visible')
                            ->label('Отборажение на сайте')
                            ->size(IconEntry\IconEntrySize::ExtraLarge)
                            ->boolean(),
                    ])->columns(2)
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
            'index' => \App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages\ListEventGuests::route('/'),
            'create' => \App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages\CreateEventGuests::route('/create'),
            'view' => \App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages\ViewEventGuests::route('/{record}'),
            'edit' => \App\Filament\Clusters\EventOrganizers\Resources\EventGuestsResource\Pages\EditEventGuests::route('/{record}/edit'),
        ];
    }
}
