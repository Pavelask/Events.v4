<?php

namespace App\Filament\Resources\EventModeratorsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModeratorsRelationManager extends RelationManager
{
    protected static string $relationship = 'moderators';

    protected static ?string $modelLabel = 'Модератора';
    protected static ?string $title = 'Модераторы';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\Select::make('events_id')
//                    ->label('Выбирите мероприятие на котором пристуствует модератор')
//                    ->relationship(name: 'event', titleAttribute: 'name')
//                    ->columnSpanFull(),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->label('Фамилия')
                    ->columns(1),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->label('Имя')
                    ->columns(1),
                Forms\Components\TextInput::make('middle_name')
                    ->label('Отчество')
                    ->columns(1),
                Forms\Components\TextInput::make('job_title')
                    ->label('Должность')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Фотография')
                    ->image()
                    ->imageEditor(),
                Forms\Components\RichEditor::make('description')
                    ->label('Кракое описание')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('moderator_sort')
                    ->label('Сортировка')
                    ->maxLength(255)
                    ->default(500),
                Forms\Components\Toggle::make('is_visible')
                    ->label('отображать на сайте')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('events_id')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Фамилия')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Автарка'),
                Tables\Columns\TextColumn::make('moderator_sort')
                    ->label('Сортировка'),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('Вкл/Выкл'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
//            ->filters([
//                SelectFilter::make('events_id')
//                    ->label('Список активных мероприятий')
//                    ->relationship(name: 'event', titleAttribute: 'name')
//                    ->columnSpanFull(),
//            ], layout: FiltersLayout::AboveContent)
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
                        TextEntry::make('moderator_sort')
                            ->label('Сортировка'),
                        IconEntry::make('is_visible')
                            ->label('Отборажение на сайте')
                            ->size(IconEntry\IconEntrySize::ExtraLarge)
                            ->boolean(),
                    ])->columns(2)
            ]);
    }
}
