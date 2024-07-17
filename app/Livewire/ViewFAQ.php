<?php

namespace App\Livewire;


use App\Models\faq_tables;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ViewFAQ extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->striped()
            ->heading('Вопросы и ответы')
            ->query(faq_tables::query())
            ->columns([
                TextColumn::make('id')
                ->label('№'),
                TextColumn::make('question')
                    ->label('Вопросы'),
                TextColumn::make('answer')
                    ->label('Ответы')
                    ->wrap(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.view-f-a-q');
    }
}
