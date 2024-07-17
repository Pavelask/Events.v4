<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembersResource\Pages;
use App\Filament\Resources\MembersResource\RelationManagers;
use App\Models\Members;
use App\Models\tOrg;
use App\Models\Events;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MembersResource extends Resource
{
    protected static ?string $model = Members::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 15;

    protected static ?string $modelLabel = 'Участник';

    protected static ?string $pluralModelLabel = 'Участники';

    protected static ?string $navigationGroup = 'Мероприятия';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Список мероприятий')
                    ->description('Выбирите мероприятие из выпадающего списка на котором пристуствует гость')->schema([
                        Forms\Components\Select::make('events_id')
//                            ->required()
                            ->label('Список активных мероприятий')
                            ->relationship(name: 'memberEvent', titleAttribute: 'name')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Участник мероприятия')
                    ->schema([
                        Forms\Components\TextInput::make('surName')
//                            ->required()
                            ->label('Фамилия')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('firstName')
//                            ->required()
                            ->label('Имя')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('middleName')
//                            ->required()
                            ->label('Отчество')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\DatePicker::make('birthDate')
                            ->label('Дата рождения'),
                        Forms\Components\TextInput::make('snils')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(11)
                            ->label('СНИЛС')
                            ->columnSpan(2),
                        Forms\Components\Select::make('sex')
                            ->label("ПОЛ")
                            ->required()
                            ->options([
                                'M' => 'Мужской',
                                'W' => 'Женский',
                            ]),
                        Forms\Components\Select::make('size')
                            ->label("Размер футболки")
                            ->required()
                            ->options([
                                'XS' => 'XS',
                                'S' => 'S',
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                                'XXL' => 'XXL',
                            ])->columns(4),
                        Forms\Components\TextInput::make('education')
                            ->label('Образование')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('contactPhone')
//                            ->required()
                            ->label('Контактный номер телефона')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->label('Электроная почта')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('workPhone')
//                            ->required()
                            ->label('Рабочий номер телефона')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('name_ppo')
                            ->label('Наименование ППО')
                            ->columnSpanFull(),
                        Forms\Components\Select::make('name_to')
//                            ->required()
                            ->label('Наименование ТО')
                            ->options(tOrg::all()->pluck('name', 'id'))
                            ->searchable()
//                            ->optionsLimit(4)
                            ->columnSpanFull(),
                    ])->columns(6),
                Forms\Components\Section::make('Дополнительная информация')
                    ->schema([
                        Forms\Components\RichEditor::make('note')
                            ->label('Примечание')
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
                    ]),
//                Fieldset::make('Metadata')
//                    ->relationship('memberEvent')
//                    ->schema([
//
//                        Forms\Components\Textarea::make('memberEvent.event_agreement'),
//
//                    ]),
                Forms\Components\Section::make('Обработка персональных данных')
                    ->schema([
//                        Forms\Components\Toggle::make('confirmation')
//                            ->label('Подтвержение')
//                            ->inline(false)
//                            ->required(),
                        Forms\Components\Textarea::make('event_agreement')
                            ->label('Согалсие')
                            ->readOnly()
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('agreement')
                            ->label('Согласие на обработку персолальный данных')
                            ->inline(false)
                            ->required(),
//                        Forms\Components\Toggle::make('is_registration')
//                            ->label('Регистрация?')
//                            ->inline(false)
//                            ->required(),
                    ])->columns(3),
                Fieldset::make('Metadata')
                    ->relationship('memberEvent')
                    ->schema([
                        Forms\Components\TextInput::make('memberEvent.name')
                            ->readOnly(),
                        Forms\Components\Textarea::make('memberEvent.event_agreement')
                            ->default('memberEvent.event_agreement')
                            ->readOnly(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMembers::route('/create'),
            'view' => Pages\ViewMembers::route('/{record}'),
            'edit' => Pages\EditMembers::route('/{record}/edit'),
        ];
    }
}
