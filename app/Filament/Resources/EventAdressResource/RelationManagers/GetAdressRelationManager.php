<?php

namespace App\Filament\Resources\EventAdressResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GetAdressRelationManager extends RelationManager
{
    protected static string $relationship = 'getAdress';

    protected static ?string $title = 'Адрес и контакты';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('city')
            ->columns([
                Tables\Columns\TextColumn::make('city')
                    ->label('Город'),
                Tables\Columns\TextColumn::make('adress')
                    ->label('Адрес и место'),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('Вкл/Выкл')
                    ->width(100),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
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
