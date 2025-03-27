<?php

namespace App\Livewire;

use App\Models\event_status;
use App\Models\Events;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class Slider extends Component
{
    public function render()
    {

        $Events = Events::where('event_status', 'active')->orderBy('created_at', 'desc')->get();

//        dd($Events->count());
        if(!$Events) {
            abort(500);
        }

        $Event = $Events->first();

        $Greetings = $Event->greetings->where('is_visible', 1)->all();

        $Adress = $Event->getAdress->where('is_visible', 1)->first();
//        dd($Adress);

        $Moderators = $Event->moderators->where('is_visible', 1)->all();

        $Organizers = $Event->organizers->where('is_visible', 1)->all();

        $Partners = $Event->partners->where('is_visible', 1)->all();

        $Guests = $Event->guests->where('is_visible', 1)->all();

        $Documents = $Event->eventsDocumen->where('is_visible', 1)->all();

        $Schedules = $Event->getSchedules->where('is_visible', 1);

        $Timeline = $Event->timetablesEvent->where('event_id', $Event->id)->all();

        return view('livewire.slider', [
            'Event' => $Event,
            'Greetings' => $Greetings,
            'Adress' => $Adress,
            'Schedules' => $Schedules,
            'Timeline' => $Timeline,
            'Moderators' => $Moderators,
            'Guests' => $Guests,
            'Organizers' => $Organizers,
            'Partners' => $Partners,
            'Documents' => $Documents
        ]);
    }
}
