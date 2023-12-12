<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Tariff;

class TariffManagement extends Component
{
    public $tariffs;
    public function __construct()
    {
        $this->tariffs=Tariff::all();
    }
    public function render()
    {
        return view('livewire.tariff-management');
    }
}
