<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannersResource\Pages;
use App\Filament\Resources\BannersResource\RelationManagers;
use App\Models\Banners;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannersResource extends Resource
{
    protected static ?string $model = Banners::class;

    protected static ?int $navigationSort = 30;

    protected static ?string $modelLabel = 'Баннер';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Главный баннер';

    protected static ?string $navigationGroup = 'Настройки мероприятия';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('events_id')
                    ->label('Список активных мероприятий')
                    ->relationship(name: 'event', titleAttribute: 'name')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('banner_name')
                    ->label('Название баннера')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('banner_image')
                    ->label('Изображение баннера')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('banner_url')
                    ->label('Сыылка баннера')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('banner_sort')
                    ->label('Сортировка')
                    ->required()
                    ->maxLength(255)
                    ->default(500),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Показывать на сайте')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('events_id')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('banner_name')
                    ->label('Название баннера')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('Изображение баннера'),
                Tables\Columns\TextColumn::make('banner_url')
                    ->label('Ссылка баннера')
                    ->searchable(),
                Tables\Columns\TextColumn::make('banner_sort')
                    ->label('Сортировка баннера')
                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\IconColumn::make('is_visible')
//                    ->label('Отображать баннер баннера')
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanners::route('/create'),
            'view' => Pages\ViewBanners::route('/{record}'),
            'edit' => Pages\EditBanners::route('/{record}/edit'),
        ];
    }
}
