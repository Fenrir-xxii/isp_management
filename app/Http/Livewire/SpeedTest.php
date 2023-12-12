<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SpeedTest extends Component
{
    public function render()
    {
        return view('livewire.speed-test')->layout('layouts.cabinet.business-speed-test');
    }
}
