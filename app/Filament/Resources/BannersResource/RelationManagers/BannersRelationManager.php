<?php

namespace App\Filament\Resources\BannersResource\RelationManagers;

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

class BannersRelationManager extends RelationManager
{
    protected static string $relationship = 'banners';

    protected static ?string $modelLabel = 'Баннер';

    protected static ?string $title = 'Главный баннер';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('banner_sort')
                    ->label('Сортировка')
                    ->required()
                    ->default(500),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Показывать на сайте'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('events_id')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('banner_name')
                    ->label('Название баннера'),
                Tables\Columns\ImageColumn::make('banner_image')
                    ->label('Изображение баннера'),
                Tables\Columns\TextColumn::make('banner_url')
                    ->label('Ссылка баннера'),
//                Tables\Columns\TextColumn::make('banner_sort')
//                    ->label('Сортировка баннера'),
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
