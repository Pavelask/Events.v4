<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventImagesResource\Pages;
use App\Filament\Resources\EventImagesResource\RelationManagers;
use App\Models\EventImages;
use Filament\Forms;
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

class EventImagesResource extends Resource
{
    protected static ?string $model = EventImages::class;

    protected static ?int $navigationSort = 300;

    protected static ?string $modelLabel = 'Фотографии';
    protected static bool $hasTitleCaseModelLabel = false;
    protected static ?string $pluralModelLabel = 'Фотографии';

    protected static ?string $navigationGroup = 'Настройки мероприятия';

    protected static ?string $navigationIcon = 'heroicon-m-camera';

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
                Forms\Components\Section::make('ФИО и должность')
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

    public static function table(Table $table): Table
    {
        return $table
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
            'index' => Pages\ListEventImages::route('/'),
            'create' => Pages\CreateEventImages::route('/create'),
            'view' => Pages\ViewEventImages::route('/{record}'),
            'edit' => Pages\EditEventImages::route('/{record}/edit'),
        ];
    }
}
