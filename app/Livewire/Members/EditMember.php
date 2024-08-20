<?php

namespace App\Livewire\Members;

use App\Models\Events;
use App\Models\Members;
use App\Models\tOrg;
use App\Notifications\NewMemberForAdmin;
use App\Notifications\UpdateMember;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class EditMember extends Component implements HasForms
{
    use InteractsWithForms;
    use Notifiable;

    public ?array $data = [];

    public Members $record;


    public function mount(): void
    {
        if(Auth::user()->id != $this->record->user_id) {

            Notification::make()
                ->title('Анкета участника не совпадает с ID польльзователя')
//                ->body('Не рекомендуется исправлять строку в браузере')
                ->icon('heroicon-o-exclamation-triangle')
                ->iconColor('danger')
                ->color('danger')
                ->seconds(15)
                ->send();

            $this->redirectRoute('dashboard');
        }

        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Регистрация на меорприятие')
                    ->description('Запоните поля анкеты, поля отмеченные * (звездочкой) заполняются обязательно')->schema([
                        TextInput::make('eventsName')
                            ->label('Мероприятие')
//                            ->disabled()
                            ->readOnly()
                            ->default(Events::where('event_status', 'active')->pluck('name', 'id')->first()),
                        Hidden::make('events_id')
                            ->default(Events::where('event_status', 'active')->pluck('id', 'id')->first()),
                        Hidden::make('user_id')
                            ->default(Auth::user()->id)
                    ]),
                Section::make('Участник мероприятия')
                    ->schema([
                        TextInput::make('surName')
                            ->required()
                            ->label('Фамилия')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('firstName')
                            ->required()
                            ->label('Имя')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('middleName')
                            ->required()
                            ->label('Отчество')
                            ->maxLength(255)
                            ->columnSpan(2),
                        DatePicker::make('birthDate')
                            ->label('Дата рождения')
                            ->required(),
                        TextInput::make('snils')
                            ->required()
                            ->mask('999-999-999 99')
                            ->placeholder('999-999-999 99')
                            ->label('СНИЛС')
                            ->columnSpan(2),
                        Select::make('sex')
                            ->label("ПОЛ")
                            ->required()
                            ->options([
                                'M' => 'Мужской',
                                'W' => 'Женский',
                            ]),
                        Select::make('size')
                            ->label("Размер футболки")
                            ->required()
                            ->options([
                                'XS' => 'XS',
                                'S' => 'S',
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                                'XXL' => 'XXL',
                                'XXXL' => 'XXXL',
                            ])->columns(4),
                        TextInput::make('education')
                            ->label('Образование (укажите наименование учебного заведения)')
                            ->columnSpanFull(),
                        TextInput::make('contactPhone')
                            ->mask('+7 (999) 999-99-99')
                            ->placeholder('+7 (999) 999-99-99')
                            ->required()
                            ->label('Контактный номер телефона')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('email')
                            ->required()
                            ->label('Электроная почта')
                            ->default(Auth::user()->email)
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('workPhone')
//                            ->required()
//                            ->mask('+7 (999) 999-99-99')
//                            ->placeholder('+7 (999) 999-99-99')
                            ->label('Рабочий номер телефона (в свободной форме)')
                            ->maxLength(255)
                            ->columnSpan(2),
                        TextInput::make('job_title')
                            ->label('Должность')
                            ->columnSpanFull(),
                        TextInput::make('name_ppo')
                            ->required()
                            ->label('Наименование ППО')
                            ->columnSpanFull(),
                        Select::make('name_to')
                            ->required()
                            ->label('Наименование ТО')
                            ->options(tOrg::all()->pluck('name', 'id'))
//                            ->searchable()
//                            ->optionsLimit(4)
                            ->columnSpanFull(),
                    ])->columns(6),
                Section::make('Дополнительная информация')
                    ->schema([
                        Textarea::make('note')
                            ->rows(3)
                            ->label('Примечание'),
                    ]),

                Section::make('Обработка персональных данных')
                    ->schema([
                        Placeholder::make('documentation')
                            ->content(new HtmlString(
                                ' <div class="text-justify">' . Events::where('event_status', 'active')->pluck('event_agreement')->first() . '</div>'
                            ))
                            ->label('')
                            ->columnSpanFull(),
                        Toggle::make('agreement')
                            ->label('Согласен')
                            ->inline(true)
                            ->onColor('success')
                            ->offColor('danger')
                            ->required()
                            ->accepted(),
                    ])->columns(3),

            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->record->update($data);

        Notification::make()
            ->title('Анкета участника успешно обновлена')
            ->body('Анкета будет проверена и в случае необходимости с Вами свяжутся')
            ->icon('heroicon-o-document-text')
            ->iconColor('success')
            ->color('success')
            ->seconds(10)
            ->send();

        $user = auth()->user();

//        $user->notify(new UpdateMember);
//        $user->notify(new NewMemberForAdmin);

//        $mail = 'admin@elprof.ru';
//        Notification::send($mail, new NewMemberForAdmin());

        $this->redirectRoute('dashboard');
    }

    public function cancel(): void
    {
        $this->form->fill();
        $this->redirectRoute('dashboard');
    }

    public function render(): View
    {
        return view('livewire.members.edit-member')->layout('layouts.app');
    }
}
