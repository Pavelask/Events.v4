<?php

namespace App\Livewire\Members;

use App\Models\Members;
use App\Models\tOrg;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateMember extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Список мероприятий')
                    ->description('Выбирите мероприятие из выпадающего списка на котором пристуствует гость')->schema([
                        Select::make('events_id')
//                            ->required()
                            ->label('Список активных мероприятий')
                            ->relationship(name: 'memberEvent', titleAttribute: 'name')
                            ->columnSpanFull(),
                    ]),
                Section::make('Участник мероприятия')
                    ->schema([
                        TextInput::make('surName')
//                            ->required()
                            ->label('Фамилия')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('firstName')
//                            ->required()
                            ->label('Имя')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('middleName')
//                            ->required()
                            ->label('Отчество')
                            ->maxLength(255)
                            ->columnSpan(2),
                        DatePicker::make('birthDate')
                            ->label('Дата рождения'),
                        TextInput::make('snils')
//                            ->required()
//                            ->numeric()
                            ->minValue(1)
                            ->maxValue(11)
                            ->label('СНИЛС')
                            ->columnSpan(2),
                        Select::make('sex')
                            ->label("ПОЛ")
//                            ->required()
                            ->options([
                                'M' => 'Мужской',
                                'W' => 'Женский',
                            ]),
                        Select::make('size')
                            ->label("Размер футболки")
//                            ->required()
                            ->options([
                                'XS' => 'XS',
                                'S' => 'S',
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                                'XXL' => 'XXL',
                            ])->columns(4),
                        TextInput::make('education')
                            ->label('Образование')
                            ->columnSpanFull(),
                        TextInput::make('contactPhone')
//                            ->required()
                            ->label('Контактный номер телефона')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('email')
//                            ->required()
                            ->label('Электроная почта')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('workPhone')
//                            ->required()
                            ->label('Рабочий номер телефона')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('name_ppo')
                            ->label('Наименование ППО')
                            ->columnSpanFull(),
                        Select::make('name_to')
//                            ->required()
                            ->label('Наименование ТО')
                            ->options(tOrg::all()->pluck('name', 'id'))
                            ->searchable()
//                            ->optionsLimit(4)
                            ->columnSpanFull(),
                    ])->columns(6),
                Section::make('Дополнительная информация')
                    ->schema([
                        Textarea::make('note')
                            ->label('Примечание')
                            ->rows(6)
                    ]),
                Fieldset::make('Metadata')
                    ->relationship('memberEvent')
                    ->schema([

                        Textarea::make('memberEvent.event_agreement'),

                    ]),
                Section::make('Обработка персональных данных')
                    ->schema([
//                        Forms\Components\Toggle::make('confirmation')
//                            ->label('Подтвержение')
//                            ->inline(false)
//                            ->required(),
                        Textarea::make('event_agreement')
                            ->rows(6)
                            ->label('Согалсие')
                            ->readOnly()
                            ->columnSpanFull(),
                        Toggle::make('agreement')
                            ->label('Согласие на обработку персолальный данных')
                            ->inline(false)
                            ->required(),
//                        Forms\Components\Toggle::make('is_registration')
//                            ->label('Регистрация?')
//                            ->inline(false)
//                            ->required(),
                    ])->columns(3),
            ])
            ->statePath('data')
            ->model(Members::class);
    }

    public function create(): void
    {
        dd($this->form->getState());

//        $record = Members::create($data);

//        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.members.create-member');
    }
}
