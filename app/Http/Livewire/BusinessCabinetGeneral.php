<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CorporateClient;
use Illuminate\Database\Eloquent\Collection;

class BusinessCabinetGeneral extends Component
{
    public $corporate_client;
    
    public $additional_options = array();
    public $additional_options_cost = 0;
    public $editInfoPageShow = false;
    public function mount(CorporateClient $client, Collection $options)
    {
        // var_dump($client); die();
        $this->corporate_client = $client;
        $this->additional_options = $options;
        foreach($this->additional_options as $option)
        {
            $this->additional_options_cost += $option->price;
        }
    }
    public function render()
    {
        return view('livewire.business-cabinet-general');
    }
    public function showEditInfoPage()
    {
        $this->editInfoPageShow = true;
    }
}
