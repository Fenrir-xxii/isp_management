<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AdditionalOption;
use App\Models\ClientAdditionalServices;
use App\Models\ClientMainServices;

class ClientRegisterAdditionalOption extends Component
{
    public $isCorporate = false;
    public $client_id = false;
    public $additional_options = array();
    public $selected_option = null;
    public function mount($isCorporate, $id)
    {
        $this->isCorporate = $isCorporate;
        $this->client_id = $id;
        if($this->isCorporate){
            $mainService = ClientMainServices::where('corporate_client_id', $this->client_id)->first(); // TO DO
        }
        else{
            $mainService = ClientMainServices::where('individual_client_id', $this->client_id)->first(); // TO DO
        }
        $additional_services = ClientAdditionalServices::where('client_main_service_id', $mainService->id)->pluck('additional_option_id')->toArray();
        $this->additional_options = AdditionalOption::wherenot('id', $additional_services)->get();
        // $this->additional_options = AdditionalOption::all(); // TO DO
    }
    public function render()
    {
        return view('livewire.client-register-additional-option');
    }
    public function register()
    {
        if(is_null($this->selected_option))
        {
            return;
        }
        $clientOption = new ClientAdditionalServices();
        if($this->isCorporate){
            $mainService = ClientMainServices::where('corporate_client_id', $this->client_id)->first(); // TO DO
        }
        else{
            $mainService = ClientMainServices::where('individual_client_id', $this->client_id)->first(); // TO DO
        }
        $clientOption->client_main_service_id = $mainService->id;
        $clientOption->additional_option_id = $this->selected_option;
        $clientOption->status_id = 1;
        $clientOption->save();

        return redirect('/' . $this->isCorporate . $this->client_id . '/additional-options')->with('status', 'New Additional Option added successfully.');
    }
}
