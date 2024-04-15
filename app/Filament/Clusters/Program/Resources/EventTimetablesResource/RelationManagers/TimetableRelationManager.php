<?php

namespace App\Filament\Clusters\Program\Resources\EventTimetablesResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimetableRelationManager extends RelationManager
{
    protected static string $relationship = 'timetable';

    protected static ?string $modelLabel = 'Таймлайн';

    protected static ?string $title = 'Таймлайн';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Расписание на день')
                    ->icon('heroicon-o-calendar')
                    ->description('')
                    ->schema([
//                        Forms\Components\TextInput::make('schedule_id')
//                            ->required()
//                            ->numeric(),
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
                            ->required(),
                        Forms\Components\TextInput::make('sort')
                            ->label('Сортировка')
                            ->default(500)
                            ->maxLength(255),
                    ])->columns(3)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('time')
            ->columns([
                Tables\Columns\TextColumn::make('time')
                    ->label('Время'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->wrap(),
                Tables\Columns\TextInputColumn::make('sort')
                    ->width(100)
                    ->label('SORT'),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->width(100)
                    ->label('Вкл/Выкл'),
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
}
