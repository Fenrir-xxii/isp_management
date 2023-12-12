<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tariff;

class EditTariff extends Component
{
    public Tariff $tariff;
    public $title;
    public $download_max_speed = '';
    public $upload_max_speed = '';
    public $price;
    protected $rules = [
        'title' => 'required|min:3',
        // '$download_max_speed' => 'required|numeric|max:1000',
        // '$upload_max_speed' => 'required|numeric|max:1000',
        'price' => 'required|numeric'
    ];
 
    public function mount($id) 
    {
        $this->tariff = Tariff::findOrFail($id);
        $this->title = $this->tariff->title;
        $this->price = $this->tariff->price;
        $this->download_max_speed = $this->get_numerics($this->tariff->max_speed)[0];
        $this->upload_max_speed = $this->get_numerics($this->tariff->max_speed)[1];
    }
 
    public function render()
    {
        return view('livewire.edit-tariff');
    }
    public function save()
    {
        // TO DO
        $this->tariff->title = $this->title;
        $this->tariff->price = $this->price;
        $this->tariff->max_speed = $this->download_max_speed . '/' .  $this->upload_max_speed . ' Mbit/s';
        $this->tariff->save();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function get_numerics ($str) {
        preg_match_all('/\d+/', $str, $matches);
        return $matches[0];
    }
}
