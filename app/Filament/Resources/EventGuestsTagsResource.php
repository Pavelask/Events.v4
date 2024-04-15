<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventGuestsTagsResource\Pages;
use App\Filament\Resources\EventGuestsTagsResource\RelationManagers;
use App\Models\EventGuestsTags;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class EventGuestsTagsResource extends Resource
{
    protected static ?string $model = EventGuestsTags::class;

    protected static ?int $navigationSort = 75;

    protected static ?string $modelLabel = 'Теги';
    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $pluralModelLabel = 'Теги';

    protected static ?string $navigationGroup = 'Справочники мероприятия';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Название тега')
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->label('Тег')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tags_sort')
                    ->label('Сортировка')
                    ->required()
                    ->maxLength(255)
                    ->default(500),
                Forms\Components\Toggle::make('is_visible')
                    ->inline( false)
                    ->label('ВКЛ/ВЫКЛ')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->width(30)
                    ->alignCenter()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название тега')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Tag')
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('tags_sort')
                    ->label('Сортировка')
                    ->width(50)
                    ->alignCenter()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->width(130)
                    ->alignCenter()
                    ->label('ON/OFF'),
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEventGuestsTags::route('/'),
//            'create' => Pages\CreateEventGuestsTags::route('/create'),
//            'view' => Pages\ViewEventGuestsTags::route('/{record}'),
//            'edit' => Pages\EditEventGuestsTags::route('/{record}/edit'),
        ];
    }
}
