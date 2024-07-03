<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TOrgResource\Pages;
use App\Filament\Resources\TOrgResource\RelationManagers;
use App\Models\TOrg;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TOrgResource extends Resource
{
    protected static ?string $model = tOrg::class;

    protected static ?int $navigationSort = 95;

    protected static ?string $modelLabel = 'Терреториальные организации';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Терреториальные организации';

    protected static ?string $navigationGroup = 'Справочники мероприятия';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Наименование организации')
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->label('Код организации')
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Описание')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sort')
                    ->required()
                    ->label('Сортировка (по умолчанию 500)')
                    ->maxLength(255)
                    ->default(500),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Отображать на сайте')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name')
                    ->wrap()
                    ->label('Наименование организации')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Код')
                    ->width(50)
                    ->alignCenter()
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('sort')
                    ->label('Сорт')
                    ->width(50)
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->label('OFF|ON')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-s-eye')
                    ->offIcon('heroicon-s-eye-slash')
                    ->alignCenter(),
            ])->defaultPaginationPageOption(25)
                ->striped()
//            ->defaultGroup('is_visible')
            ->filters([
                //
            ])
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
            'index' => Pages\ListTOrgs::route('/'),
            'create' => Pages\CreateTOrg::route('/create'),
            'view' => Pages\ViewTOrg::route('/{record}'),
            'edit' => Pages\EditTOrg::route('/{record}/edit'),
        ];
    }
}
