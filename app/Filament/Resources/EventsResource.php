<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\EventOrganizers\Resources\EventModeratorsResource\RelationManagers\ModeratorsRelationManager;
use App\Filament\Clusters\EventOrganizers\Resources\OrganizersResource\RelationManagers\OrganizersRelationManager;
use App\Filament\Clusters\Program\Resources\EventSchedulesResource\RelationManagers\GetSchedulesRelationManager;
use App\Filament\Resources\BannersResource\RelationManagers\BannersRelationManager;
use App\Filament\Resources\EventAdressResource\RelationManagers\GetAdressRelationManager;
use App\Filament\Resources\EventDocumentsResource\RelationManagers\EventsDocumenRelationManager;
use App\Filament\Resources\EventGreetingsResource\RelationManagers\GreetingsRelationManager;
use App\Filament\Resources\EventGuestsResource\RelationManagers\GuestsRelationManager;
use App\Filament\Resources\EventImagesResource\RelationManagers\EventsImageRelationManager;

use App\Filament\Resources\EventsResource\Pages;

use App\Models\event_status;
use App\Models\event_types;
use App\Models\Events;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsResource extends Resource
{
    protected static ?string $model = Events::class;

    protected static ?int $navigationSort = 10;

    protected static ?string $modelLabel = 'Мероприятие';

    protected static ?string $pluralModelLabel = 'Мероприятия';

//  protected static ?string $navigationGroup = 'Настройки мероприятия';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Название мероприятия')
                    ->description('Введите название и если нообходимо краткое описание')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Название мероприятия')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Дата проведения, тип и статус мероприятия')
                    ->description('Выбирите дату провдения, статус и тип мероприятия')
                    ->schema([
                        Forms\Components\DatePicker::make('date_start')
                            ->label('Дата начала'),
                        Forms\Components\DatePicker::make('date_end')
                            ->label('Дата окончания'),
                        Forms\Components\Select::make('event_type')
                            ->label('Тип мероприятия')
                            ->options(event_types::all()->pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\Select::make('event_status')
                            ->label('Статус мероприятия')
                            ->options(event_status::all()->pluck('name', 'slug'))
                            ->searchable(),
                    ])->columns(2),
                Forms\Components\Section::make('Логотип и пользовательскоей соглашение')
                    ->description('Загрузите логотим, при необходимости отредактируйте его и доавте пользовательское соглашение')
                    ->schema([
                        Forms\Components\FileUpload::make('event_banner_logo')
                            ->label('Логотип мероприятия')
                            ->imageEditor()
                            ->image(),
                        Forms\Components\RichEditor::make('event_agreement')
                            ->label('Соглашение')
                            ->toolbarButtons([
//                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
//                                'codeBlock',
//                                'h2',
//                                'h3',
//                                'italic',
//                                'link',
                                'orderedList',
//                                'redo',
//                                'strike',
//                                'underline',
//                                'undo',
                            ]),
                    ])->columns(2),

                Forms\Components\Section::make('YouTube')
                    ->description('Введите название сыылки, если ссылка не нужна, оставтье поле путстым')
                    ->schema([
                        Forms\Components\TextInput::make('youtube_link')
                            ->label('')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Дополнительные настройки')
                    ->description('Сортировка, отображение на сайте, паспортные данные для анкеты участника, регистрация на мероприятие')
                    ->schema([
                        Forms\Components\TextInput::make('event_sort')
                            ->label('Сортировка')
                            ->required()
                            ->default(500),
                        Forms\Components\Toggle::make('is_visible')
                            ->label('Показывать на сайте?')
                            ->inline(false)
                            ->required(),
                        Forms\Components\Toggle::make('is_passport')
                            ->label('Паспортные данные?')
                            ->inline(false)
                            ->required(),
                        Forms\Components\Toggle::make('is_registration')
                            ->label('Регистрация?')
                            ->inline(false)
                            ->required(),
                    ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('id')
//                    ->label('ID')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название мероприятия')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('event_banner_logo')
                    ->alignCenter()
                    ->width(100)
                    ->height(100)
                    ->label('Логотип'),
//                Tables\Columns\TextColumn::make('date_start')
//                    ->date()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('date_end')
//                    ->date()
//                    ->sortable(),
                Tables\Columns\SelectColumn::make('event_type')
                    ->alignCenter()
                    ->label('Тип')
                    ->width(150)
                    ->options(event_types::all()->pluck('name', 'id')),
                Tables\Columns\SelectColumn::make('event_status')
                    ->alignCenter()
                    ->width(150)
                    ->label('Статус')
                    ->options(event_status::all()->pluck('name', 'slug')),
                Tables\Columns\ToggleColumn::make('is_visible')
                    ->alignCenter()
                    ->label('ВКЛ'),
//                Tables\Columns\IconColumn::make('is_passport')
//                    ->boolean(),
//                Tables\Columns\IconColumn::make('is_registration')
//                    ->boolean(),
//                Tables\Columns\TextColumn::make('event_sort')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
//                    DeleteAction::make(),
                ])
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Fieldset::make('Данные мероприятия')
                    ->schema([
                        ImageEntry::make('event_banner_logo')
                            ->label(''),
//                        TextEntry::make('id')
//                            ->label('ID Мероприятия'),
                        TextEntry::make('name')
                            ->label('Название мероприятия')
                            ->columnSpan(2),
                        TextEntry::make('date_start')
                            ->dateTime('d F Y')
                            ->label('Дата начала мероприятия'),
                        TextEntry::make('date_end')
                            ->dateTime('d F Y')
                            ->label('Дата окончания мероприятия'),

                    ])->columns(3),
            ]);

    }
    public static function getRelations(): array
    {
        return [
            GetAdressRelationManager::class,
            BannersRelationManager::class,
            GreetingsRelationManager::class,
            ModeratorsRelationManager::class,
            GuestsRelationManager::class,
            OrganizersRelationManager::class,
            EventsDocumenRelationManager::class,
            EventsImageRelationManager::class,
            GetSchedulesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvents::route('/create'),
            'view' => Pages\ViewEvents::route('/{record}'),
            'edit' => Pages\EditEvents::route('/{record}/edit'),
        ];
    }
}
