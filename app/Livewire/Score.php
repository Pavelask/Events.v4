<?php

namespace App\Livewire;

use Livewire\Component;

class Score extends Component
{
    public $green = 0;
    public $red = 0;

    public function incrementRed()
    {
        if ($this->red < 6) {
            $this->red++;
        }
    }

    public function decrementRed()
    {
        if ($this->red > 0) {
            $this->red--;
        }

    }

    public function incrementGreen()
    {
        if ($this->green < 6) {
            $this->green++;
        }

    }

    public function decrementGreen()
    {
        if ($this->green > 0) {
            $this->green--;
        }
    }

    public function render()
    {
        return view('livewire.score');
    }
}
