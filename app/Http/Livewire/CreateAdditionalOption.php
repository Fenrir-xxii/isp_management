<?php

namespace App\Http\Livewire;

use App\Models\AdditionalOption;
use Livewire\Component;

class CreateAdditionalOption extends Component
{
    public $title = '';
    public $price = '';
    public $description = '';
    protected $rules = [
        'title' => 'required|min:3',
        'price' => 'required|numeric'
    ];
    public function render()
    {
        return view('livewire.create-additional-option');
    }
    public function register()
    {
        AdditionalOption::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description
        ]);
        return redirect('/additional-options-management')->with('status', 'New Option successfully created.');
    }
}
