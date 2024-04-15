<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventGreetingsResource\Pages;
use App\Filament\Resources\EventGreetingsResource\RelationManagers;
use App\Models\EventGreetings;
use App\Models\Greetings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventGreetingsResource extends Resource
{
    protected static ?string $model = Greetings::class;
    protected static ?int $navigationSort = 20;
    protected static ?string $modelLabel = 'Приветствие';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Приветствие на сайт';
    protected static ?string $navigationGroup = 'Настройки мероприятия';
    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('events_id')
                    ->label('Список активных мероприятий')
                    ->relationship(name: 'event', titleAttribute: 'name')
                    ->columnSpanFull(),
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
                    ->label('Показывать на сайте'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('events_id')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('greetings_title')
                    ->label('Приветствие')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('greetings_image')
                    ->label('Фотография'),
                Tables\Columns\TextColumn::make('greetings_sort')
                    ->searchable()
                    ->label('Сортировка')
                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\IconColumn::make('is_visible')
//                    ->label('Отоображать на сайте')
//                    ->boolean()
//                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('Вкл/Выкл'),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('events_id')
                    ->label('Список активных мероприятий')
                    ->relationship(name: 'event', titleAttribute: 'name')
                    ->columnSpanFull(),
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListEventGreetings::route('/'),
            'create' => Pages\CreateEventGreetings::route('/create'),
            'view' => Pages\ViewEventGreetings::route('/{record}'),
            'edit' => Pages\EditEventGreetings::route('/{record}/edit'),
        ];
    }
}
