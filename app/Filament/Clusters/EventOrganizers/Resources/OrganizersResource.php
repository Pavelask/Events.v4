<?php

namespace App\Filament\Clusters\EventOrganizers\Resources;

use App\Filament\Clusters\EventOrganizers;
use App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\Pages;
use App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\RelationManagers;
use App\Models\Organizers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizersResource extends Resource
{
    protected static ?string $model = Organizers::class;

    protected static string $relationship = 'getOrganizers';
    protected static ?int $navigationSort = 300;

    protected static ?string $modelLabel = 'Организаторы';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Организаторы';

//    protected static ?string $navigationGroup = 'Мероприятия ВЭП';
    protected static ?string $navigationIcon = 'heroicon-m-user-group';


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
                    ->label('OFF|ON')
                    ->required()
                    ->maxLength(255)
                    ->default(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
    //                Tables\Columns\TextColumn::make('middle_name')
    //                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
//                Tables\Columns\TextColumn::make('job_title')
//                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
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
            RelationManagers\OrganizersTagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizers::route('/'),
            'create' => Pages\CreateOrganizers::route('/create'),
            'view' => Pages\ViewOrganizers::route('/{record}'),
            'edit' => Pages\EditOrganizers::route('/{record}/edit'),
        ];
    }
}
