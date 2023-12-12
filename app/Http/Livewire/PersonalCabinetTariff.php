<?php

namespace App\Http\Livewire;

use App\Models\ClientMainServices;
use Livewire\Component;
use App\Models\IndividualClient;
use App\Models\Tariff;

class PersonalCabinetTariff extends Component
{
    public $individual_client;
    public $tariffs;
    public $tariff_id;  // wire to a select option
    public $current_tariff_id; // to disable option
    public function mount(IndividualClient $client)
    {
        $this->individual_client = $client;
        $this->tariffs = Tariff::all();
        $this->current_tariff_id = Tariff::where('id', $this->individual_client->tariff_id)->first()->id;
        $this->tariff_id = $this->current_tariff_id;
    }
    public function render()
    {
        return view('livewire.personal-cabinet-tariff');
    }
    public function register()
    {
        // var_dump($this->tariff_id);die();

        //TO DO logic
        $newTariff = Tariff::where('id', $this->tariff_id)->first();
        $this->individual_client->tariff_id = $newTariff->id;
        $this->individual_client->save();
        $clientMainService = ClientMainServices::where('individual_client_id', $this->individual_client->id)->first(); // TO DO
        $clientMainService->tariff_id = $newTariff->id;
        $clientMainService->save();
        return redirect('/personal-cabinet')->with('status', 'Request for tariff change sent successfully.');
    }
}
