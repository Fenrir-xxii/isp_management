<?php

namespace App\Http\Livewire;

use App\Models\AdditionalOption;
use Livewire\Component;

class AdditionalOptionsManagement extends Component
{
    public $additional_options;
    public function __construct()
    {
        $this->additional_options=AdditionalOption::all();
    }
    public function render()
    {
        return view('livewire.additional-options-management');
    }
}
