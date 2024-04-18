<?php

namespace App\Filament\Clusters\EventOrganizers\Resources;

use App\Filament\Clusters\EventOrganizers;
use App\Filament\Clusters\EventOrganizers\Resources\PartnersResource\Pages;
use App\Filament\Clusters\EventOrganizers\Resources\PartnersResource\RelationManagers;
use App\Models\Partners;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnersResource extends Resource
{
    protected static ?string $model = Partners::class;

    protected static ?int $navigationSort = 200;

    protected static ?string $modelLabel = 'Партнера';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Партнеры';

//    protected static ?string $navigationGroup = 'Мероприятия ВЭП';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = EventOrganizers::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Список мероприятий')
                    ->description('Выбирите мероприятие из выпадающего списка на котором пристуствует гость')->schema([
                        Forms\Components\Select::make('events_id')
                            ->label('Список активных мероприятий')
                            ->relationship(name: 'event', titleAttribute: 'name')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Название партнера')
                    ->description('')->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('')
                            ->columnSpanFull()
                            ->maxLength(255),
                    ])->columns(3),

                Forms\Components\Section::make('Логотип и описание')
                    ->description('')->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Логотип')
                            ->imageEditor()
                            ->image(),
                        Forms\Components\RichEditor::make('description')
                            ->label('Описание')
                            ->columnSpan(2),
                    ])->columns(3),

                Forms\Components\Toggle::make('is_visible')
                    ->label('OFF|ON')
                    ->inline(false)
                    ->required(),

                Forms\Components\TextInput::make('sort')
                    ->label('SORT')
                    ->required()
                    ->maxLength(255)
                    ->default(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('logo')
                    ->defaultImageUrl(url('storage/img/no-photography-icon.png')),
                Tables\Columns\TextInputColumn::make('sort')
                    ->alignCenter()
                    ->width(100)
                    ->label('SORT'),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('OFF|ON')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-s-eye')
                    ->offIcon('heroicon-s-eye-slash')
                    ->alignCenter(),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartners::route('/create'),
            'view' => Pages\ViewPartners::route('/{record}'),
            'edit' => Pages\EditPartners::route('/{record}/edit'),
        ];
    }
}
