<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventAdressResource\Pages;
use App\Filament\Resources\EventAdressResource\RelationManagers;
use App\Models\EventAdress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventAdressResource extends Resource
{
    protected static ?string $model = EventAdress::class;
    protected static ?int $navigationSort = 15;
    protected static ?string $modelLabel = 'Адрес';

    protected static ?string $pluralModelLabel = 'Адреса мероприятий';
    protected static ?string $navigationGroup = 'Настройки мероприятия';
    protected static ?string $navigationIcon = 'heroicon-m-map-pin';

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
                Forms\Components\Section::make('Контактная информация')
                    ->description('')->schema([
                        Forms\Components\TextInput::make('contact_info')
                            ->label('Контакты')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('city')
                            ->label('Город')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('adress')
                            ->label('Адрес')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Схема проезда на мероприятие')
                    ->description('')->schema([
                        Forms\Components\FileUpload::make('image_map')
                            ->label('Карта в виде картинки')
                            ->imageEditor()
                            ->image(),
                        Forms\Components\Textarea::make('map_code')
                            ->label('Код для вставки карты')
                            ->maxLength(255),
                    ])->columns(2),
                Forms\Components\Toggle::make('is_visible')
                    ->label('отображать на сайте')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('events_id')->label('ID'),
                Tables\Columns\TextColumn::make('city')->label('Город проведения'),
                Tables\Columns\TextColumn::make('adress')->label('Адрес и место'),
                Tables\Columns\ToggleColumn::make('is_visible')->label('Вкл/Выкл'),
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
            'index' => Pages\ListEventAdresses::route('/'),
            'create' => Pages\CreateEventAdress::route('/create'),
            'view' => Pages\ViewEventAdress::route('/{record}'),
            'edit' => Pages\EditEventAdress::route('/{record}/edit'),
        ];
    }
}
