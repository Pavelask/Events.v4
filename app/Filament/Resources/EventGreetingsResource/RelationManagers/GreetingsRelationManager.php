<?php

namespace App\Filament\Resources\EventGreetingsResource\RelationManagers;

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

class GreetingsRelationManager extends RelationManager
{
    protected static string $relationship = 'greetings';

    protected static ?string $modelLabel = 'Приветствие';

    protected static ?string $title = 'Приветствие';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('greetings_title')
                    ->label('Заголовок')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('greetings_image')
                    ->label('Фото к приветствию')
                    ->image()
                    ->imageEditor(),
                Forms\Components\RichEditor::make('greetings_text')
                    ->label('Приветствие')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('greetings_sort')
                    ->label('Сортировка')
                    ->required()
                    ->default(500),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Вкл/Выкл'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('events_id')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('greetings_title')
                    ->wrap()
                    ->label('Приветствие'),
                Tables\Columns\ImageColumn::make('greetings_image')
                    ->width(100)
                    ->height('20%')
                    ->alignCenter()
                    ->label('Фотография'),
                Tables\Columns\TextColumn::make('greetings_sort')
                    ->width(100)
                    ->alignCenter()
                    ->label('Сортировка'),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->width(100)
                    ->alignCenter()
                    ->label('ВКЛ'),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
            ])
//            ->filters([
//                SelectFilter::make('events_id')
//                    ->label('Список активных мероприятий')
//                    ->relationship(name: 'event', titleAttribute: 'name')
//                    ->columnSpanFull(),
//            ], layout: FiltersLayout::AboveContent)
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
