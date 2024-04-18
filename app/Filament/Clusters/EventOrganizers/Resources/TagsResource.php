<?php

namespace App\Filament\Clusters\EventOrganizers\Resources;

use App\Filament\Clusters\EventOrganizers;
use App\Filament\Clusters\EventOrganizers\Resources\TagsResource\Pages;
use App\Filament\Clusters\EventOrganizers\Resources\TagsResource\RelationManagers;
use App\Models\Tags;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagsResource extends Resource
{
    protected static ?string $model = Tags::class;

    protected static ?int $navigationSort = 400;

    protected static ?string $modelLabel = 'Теги';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Теги';

//    protected static ?string $navigationGroup = 'Мероприятия ВЭП';
    protected static ?string $navigationIcon = 'heroicon-m-tag';

    protected static ?string $cluster = EventOrganizers::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
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
                    ])->columns(2)
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
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
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTags::route('/create'),
            'view' => Pages\ViewTags::route('/{record}'),
            'edit' => Pages\EditTags::route('/{record}/edit'),
        ];
    }
}
