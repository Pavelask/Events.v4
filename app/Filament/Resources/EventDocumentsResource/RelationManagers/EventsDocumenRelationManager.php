<?php

namespace App\Filament\Resources\EventDocumentsResource\RelationManagers;

use Filament\Forms;
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
                Forms\Components\Section::make('')
                    ->description('')->schema([
                        Forms\Components\FileUpload::make('doc_file')
                            ->directory('eventsDocements')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                    ->prepend('eventsDocuments-prefix-'))
                            ->label('Документ')
                            ->downloadable()
                            ->columns(1),
                        Forms\Components\TextInput::make('doc_name')
                            ->label('Название документа')
                            ->columnSpan(2),
                    ])->columns(3),
                Forms\Components\TextInput::make('doc_sort')
                    ->label('Сортировка')
                    ->required()
                    ->default(500)
                    ->columns(1),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Отображать на сайте')
                    ->required()
                    ->columnSpan(2),
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
