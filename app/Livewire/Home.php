<?php

namespace App\Livewire;

use App\Models\Events;
use Livewire\Component;

class Home extends Component
{

    public $isOpen = false;

    public function openMenu()
    {
        $this->isOpen = true;
    }

    public function closeMenu()
    {
        $this->isOpen = false;
    }


    public function render()
    {
        $Event = Events::orderBy('id', 'DESC')->first();
        $Greeting = $Event->greetings->first();
        $Adress = $Event->getAdress->first();
        $Moderators = $Event->moderators->all();
        $Guests = $Event->guests->all();
        $Organizers = $Event->organizers->all();

        $Schedules = $Event->getSchedules;
        $Timeline = $Event->timetablesEvent->all();

//        dd($Organizers);
        return view('livewire.home', [
            'Event' => $Event,
            'Greeting' => $Greeting,
            'Adress' => $Adress,
            'Schedules' => $Schedules,
            'Timeline' => $Timeline,
            'Moderators' => $Moderators,
            'Guests' => $Guests,
            'Organizers' => $Organizers,
        ]);
    }
}
