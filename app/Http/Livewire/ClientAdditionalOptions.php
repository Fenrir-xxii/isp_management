<?php

namespace App\Http\Livewire;

use App\Models\AdditionalOption;
use App\Models\ClientAdditionalServices;
use App\Models\ClientMainServices;
use Livewire\Component;

class ClientAdditionalOptions extends Component
{
    public $additional_options = array();
    public $client_id = 0;
    public $isCorporate = false;
    public function mount($isCorporate, $id)
    {
        $this->client_id = $id;
        $this->isCorporate = $isCorporate;
        if($isCorporate){
            $mainService = ClientMainServices::where('corporate_client_id', $id)->first();
        }
        else{
            $mainService = ClientMainServices::where('individual_client_id', $id)->first();
        }
        $additional_services = ClientAdditionalServices::where('client_main_service_id', $mainService->id)->pluck('additional_option_id')->toArray();
        $this->additional_options = AdditionalOption::where('id', $additional_services)->get();
    }
    public function render()
    {
        return view('livewire.client-additional-options');
    }
}
