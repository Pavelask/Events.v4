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
        $Moderators = $Event->moderators->where('is_visible', 1)->all();

        $Organizers = $Event->organizers->where('is_visible', 1)->all();
        $Partners = $Event->partners->where('is_visible', 1)->all();


        $Guests = $Event->guests->where('is_visible', 1)->all();

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
            'Partners' => $Partners,
        ]);
    }
}
