<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventDocumentsResource\Pages;
use App\Filament\Resources\EventDocumentsResource\RelationManagers;
use App\Models\EventDocuments;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EventDocumentsResource extends Resource
{
    protected static ?string $model = EventDocuments::class;

    protected static ?int $navigationSort = 400;

    protected static ?string $modelLabel = 'Документы';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Документы';

    protected static ?string $navigationGroup = 'Настройки мероприятия';

    protected static ?string $navigationIcon = 'heroicon-c-folder';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('')
                    ->schema([
                        Forms\Components\Select::make('events_id')
                            ->label('Список активных мероприятий')
                            ->relationship(name: 'event', titleAttribute: 'name')
                            ->columnSpanFull()
                            ->required(),
                    ]),
                Forms\Components\Section::make('Документ')
                    ->description('')->schema([
                        Forms\Components\TextInput::make('doc_name')
                            ->label('Название документа')
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('doc_file')
                            ->directory('eventsDocements')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                                    ->prepend('eventsDocuments-prefix-'))
                            ->label('Документ')
                            ->downloadable()
                            ->columns(1),
                        MarkdownEditor::make('doc_description')
                            ->label('Описание документа')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('doc_agreement')
                            ->label('Необходимо согласится с документом в анкете участника?')
                            ->onColor('success')
                            ->offColor('danger')
                            ->columnSpan(2),
                    ])->columns(3),
                Forms\Components\Section::make('Опции')
                    ->description('')->schema([
                        Forms\Components\TextInput::make('doc_sort')
                            ->label('Сортировка')
                            ->required()
                            ->default(500)
                            ->columns(1),
                        Forms\Components\Toggle::make('is_visible')
                            ->label('Отображать на сайте')
                            ->required()
                            ->onColor('success')
                            ->offColor('danger')
                            ->columnSpan(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('doc_file')
                    ->wrap()
                    ->icon('heroicon-s-document-text')
                    ->iconColor('primary')
                    ->label('Карточка'),
                Tables\Columns\TextColumn::make('doc_name')
                    ->label('Название'),
                Tables\Columns\TextInputColumn::make('doc_sort')
                    ->label('Сортировка')
                    ->width(50)
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->width(50)
                    ->label('Вкл/Выкл'),
            ])
            ->filters([
                SelectFilter::make('events_id')
                    ->label('Список активных мероприятий')
                    ->relationship(name: 'event', titleAttribute: 'name')
                    ->columnSpanFull(),
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\ReplicateAction::make(),
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
            'index' => Pages\ListEventDocuments::route('/'),
            'create' => Pages\CreateEventDocuments::route('/create'),
            'view' => Pages\ViewEventDocuments::route('/{record}'),
            'edit' => Pages\EditEventDocuments::route('/{record}/edit'),
        ];
    }
}
