<?php

namespace App\Filament\Resources\EventImagesResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EventsImageRelationManager extends RelationManager
{
    protected static string $relationship = 'eventsImage';

    protected static ?string $modelLabel = 'Картинку';
    protected static ?string $title = 'Картинки';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                    ->description('')->schema([
                        Forms\Components\FileUpload::make('image_file')
                            ->directory('eventsImages')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                    ->prepend('eventsImage-prefix-'))
                            ->image()
                            ->imageEditor()
                            ->imageEditorMode(1)
                            ->label('Изображения')
                            ->columns(1),
                        Forms\Components\TextInput::make('image_name')
                            ->label('Название изображения')
                            ->columnSpan(2),
                    ])->columns(3),
                Forms\Components\TextInput::make('image_sort')
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
            ->recordTitleAttribute('image_name')
            ->columns([
                Tables\Columns\ImageColumn::make('image_file')
                    ->label('Карточка'),
                Tables\Columns\TextColumn::make('image_name')
                    ->label('Название'),
                Tables\Columns\TextInputColumn::make('image_sort')
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
