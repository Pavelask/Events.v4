<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizersRelationManager extends RelationManager
{
    protected static string $relationship = 'organizers';

    protected static ?string $modelLabel = 'Организатра';
    protected static ?string $title = 'Организаторы ';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('ФИО и должность')
                    ->description('')->schema([
                        Forms\Components\TextInput::make('last_name')
                            ->label('Фамилия')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('first_name')
                            ->label('Имя')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('middle_name')
                            ->label('Отчество')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('Должность')
                            ->maxLength(255)->columnSpanFull(),
                    ])->columns(3),

                Forms\Components\Section::make('Фото и краткое описание деятельностиь')
                    ->description('')->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Фотография')
                            ->imageEditor()
                            ->image(),
                        Forms\Components\RichEditor::make('description')
                            ->label('Описание')
                            ->columnSpan(2),
                    ])->columns(3),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Отображать на сайте')
                    ->inline(false)
                    ->required(),

                Forms\Components\TextInput::make('sort')
                    ->label('Сортировка')
                    ->required()
                    ->maxLength(255)
                    ->default(500),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextInputColumn::make('sort')
                    ->label('SORT')
                    ->width(100)
                    ->alignCenter()
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
