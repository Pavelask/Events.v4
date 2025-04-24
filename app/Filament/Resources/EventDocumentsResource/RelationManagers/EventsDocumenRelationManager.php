<?php

namespace App\Filament\Resources\EventDocumentsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EventsDocumenRelationManager extends RelationManager
{
    protected static string $relationship = 'eventsDocumen';

    protected static ?string $modelLabel = 'Документ';
    protected static ?string $title = 'Документы';

    public function form(Form $form): Form
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
                                    ->prepend('eventsDocuments-prefix-pdf'))
                            ->label('Документ в формате - PDF')
                            ->downloadable()
                            ->columns(1),
                        Forms\Components\FileUpload::make('docx_file')
                            ->directory('eventsDocements')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                                    ->prepend('eventsDocuments-prefix-docx'))
                            ->label('Документ в формате - RTF, DOC, DOCX')
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
                    ])->columns(2),
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('doc_name')
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
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
