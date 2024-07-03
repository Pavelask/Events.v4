<?php

namespace App\Livewire;

use App\Models\Events;
use Livewire\Component;

class Slider extends Component
{
    public function render()
    {

        $Event = Events::first();

        $Greeting = $Event->greetings->first();

        $Adress = $Event->getAdress->first();

        $Moderators = $Event->moderators->where('is_visible', 1)->all();

        $Organizers = $Event->organizers->where('is_visible', 1)->all();

        $Partners = $Event->partners->where('is_visible', 1)->all();

        $Guests = $Event->guests->where('is_visible', 1)->all();

        $Documents = $Event->eventsDocumen->all();

        $Schedules = $Event->getSchedules;

        $Timeline = $Event->timetablesEvent->where('event_id', $Event->id)->all();

//        dd($Documents);

        return view('livewire.slider', [
            'Event' => $Event,
            'Greeting' => $Greeting,
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
