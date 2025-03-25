<?php

namespace App\Livewire;

use App\Models\Events;
use App\Models\Members;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewEventActive extends Component
{

    public function mount()
    {

    }


    public function render()
    {
        $Event = Events::where('event_status', 'active')->first();
        $Adress = $Event->getAdress->first();

//        dd($Event);


        if ($Event) {
            $Member = Members::where('user_id', Auth::user()->id)->where('events_id', $Event->id)->first();
        }

        return view('livewire.view-event-active', [
            'Member' => $Member,
            'Event' => $Event,
            'Adress' => $Adress,
        ]);
    }
}
