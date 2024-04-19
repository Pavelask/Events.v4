<?php

namespace App\Filament\Clusters\Program\Resources\EventSchedulesResource\RelationManagers;


use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;

use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GetSchedulesRelationManager extends RelationManager
{
    protected static string $relationship = 'getSchedules';

    protected static ?string $modelLabel = 'Расписание';

    protected static ?string $title = 'Расписание';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('День расписания')
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

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->dateTime('d F Y')
                    ->label('Дата'),
                Tables\Columns\TextColumn::make('week')
                    ->label('День недели'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->label('Дата'),
                Tables\Columns\TextColumn::make('alt_data')
                    ->label('Дата для сайта'),
                Tables\Columns\TextInputColumn::make('sort')
                    ->width(100)
                    ->label('SORT'),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('OFF|ON')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-s-eye')
                    ->offIcon('heroicon-s-eye-slash')
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function infolist(Infolist $infolist): Infolist
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
                        TextEntry::make('date')
                            ->label('Дата'),
                        TextEntry::make('week')
                            ->label('День недели'),
                        TextEntry::make('alt_data')
                            ->label('Дата для сайта'),
                        TextEntry::make('description')
                            ->label('Описание')
                            ->html()
                            ->columnSpan(3),
                    ])->columns(3),
                Section::make('Настройки')
                    ->schema([
                        TextEntry::make('sort')
                            ->label('Сортировка'),
                        IconEntry::make('is_visible')
                            ->label('Отборажение на сайте')
                            ->size(IconEntry\IconEntrySize::ExtraLarge)
                            ->boolean(),
                    ])->columns(2)
            ]);
    }
}
