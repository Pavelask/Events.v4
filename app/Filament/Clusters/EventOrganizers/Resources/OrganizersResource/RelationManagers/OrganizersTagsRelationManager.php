<?php

namespace App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizersTagsRelationManager extends RelationManager
{
    protected static string $relationship = 'getTags';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->label('Название ТЕГа')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('SLUG')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tags_sort')
                    ->label('Сортировка')
                    ->required()
                    ->maxLength(255)
                    ->default(500),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Отображать')
                    ->inline(false)
                    ->required(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('ТЭГ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('SLUG')
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('tags_sort')
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
                Tables\Actions\AttachAction::make()->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
