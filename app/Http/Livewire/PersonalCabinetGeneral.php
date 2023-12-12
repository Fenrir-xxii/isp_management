<?php

namespace App\Http\Livewire;

use App\Models\AdditionalOption;
use Livewire\Component;
use App\Models\User;
use App\Models\IndividualClient;
use Illuminate\Database\Eloquent\Collection;

class PersonalCabinetGeneral extends Component
{
    public $individual_client;
    public $additional_options = array();
    public $additional_options_cost = 0;
    public $editInfoPageShow = false;
    public function mount(IndividualClient $client, Collection $options)
    {
        // var_dump($client); die();
        $this->individual_client = $client;
        $this->additional_options = $options;
        foreach($this->additional_options as $option)
        {
            $this->additional_options_cost += $option->price;
        }
        //$this->additional_options_cost = array_sum(array_column($this->additional_options, 'price'));
    }
    public function render()
    {
        return view('livewire.personal-cabinet-general');
    }
    public function showEditInfoPage()
    {
        $this->editInfoPageShow = true;
    }
}
