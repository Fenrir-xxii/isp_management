<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tariff;

class CreateTariff extends Component
{
    // public $tariff;
    public $download_max_speed = '';
    public $upload_max_speed = '';
    public $title = '';
    public $price = '';
    protected $rules = [
        'title' => 'required|min:3',
        'max_speed' => 'required|min:5',
        'price' => 'required|numeric'
    ];
    public function render()
    {
        return view('livewire.create-tariff');
    }
    public function register()
    {
        $max_speed_text = $this->download_max_speed . '/' . $this->upload_max_speed . ' Mbit/s';
        Tariff::create([
            'title' => $this->title,
            'max_speed' => $max_speed_text,
            'price' => $this->price,
        ]);
        return redirect('/tariff-management')->with('status', 'New Tariff successfully created.');
    }
}
