<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainTemplatesResource\Pages;
//use App\Filament\Resources\MainTemplatesResource\RelationManagers;
use App\Models\Maintemplate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MainTemplatesResource extends Resource
{
    protected static ?string $model = Maintemplate::class;


    protected static ?int $navigationSort = 100;
    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $modelLabel = 'Основной шаблон';

    protected static ?string $pluralModelLabel = 'Основной шаблон';

    protected static ?string $navigationGroup = 'Справочники';
    protected static ?string $navigationIcon = 'heroicon-c-clipboard-document-list';

//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('template_name')
                    ->required()
                    ->label('Введите имя шаблона')
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Описание шаблона')
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
                Tables\Columns\TextColumn::make('template_name')
                    ->label('Название шаблона')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Описание шаблона')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('sort')
                    ->label('Сортировка')
                    ->width(100)
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->width(100)
                    ->label('Вкл/Выкл'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()->color('warning'),
                    Tables\Actions\ViewAction::make()->color('green'),
                    Tables\Actions\ReplicateAction::make()->color('info'),
                ])->button(),
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
            'index' => Pages\ListMainTemplates::route('/'),
            'create' => Pages\CreateMainTemplates::route('/create'),
            'view' => Pages\ViewMainTemplates::route('/{record}'),
            'edit' => Pages\EditMainTemplates::route('/{record}/edit'),
        ];
    }
}
