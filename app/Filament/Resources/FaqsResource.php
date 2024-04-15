<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqsResource\Pages;
use App\Filament\Resources\FaqsResource\RelationManagers;
use App\Models\faq_tables;
use App\Models\Faqs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqsResource extends Resource
{
    protected static ?string $model = faq_tables::class;

    protected static ?int $navigationSort = 100;
    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?string $modelLabel = 'Вопрос и Ответ';

    protected static ?string $pluralModelLabel = 'Вопросы и Ответы';

    protected static ?string $navigationGroup = 'Справочники';
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->required()
                    ->label('Введите вопрос')
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\Textarea::make('answer')
                    ->label('Введите ответ')
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
                Tables\Columns\TextColumn::make('question')
                    ->label('Вопросы')
                    ->searchable(),
                Tables\Columns\TextColumn::make('answer')
                    ->label('Ответы')
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
//            ->defaultGroup('is_visible')
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaqs::route('/create'),
            'view' => Pages\ViewFaqs::route('/{record}'),
            'edit' => Pages\EditFaqs::route('/{record}/edit'),
        ];
    }
}
