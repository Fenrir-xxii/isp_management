<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CorporateClient;
use App\Models\Tariff;
use App\Models\ClientMainServices;

class BusinessCabinetTariff extends Component
{
    public $corporate_client;
    public $tariffs;
    public $tariff_id;  // wire to a select option
    public $current_tariff_id; // to disable option
    public function mount(CorporateClient $client)
    {
        $this->corporate_client = $client;
        $this->tariffs = Tariff::all();
        $this->current_tariff_id = Tariff::where('id', $this->corporate_client->tariff_id)->first()->id;
        $this->tariff_id = $this->current_tariff_id;
    }
    public function render()
    {
        return view('livewire.business-cabinet-tariff');
    }
    public function register()
    {
        // var_dump($this->tariff_id);die();

        //TO DO logic
        $newTariff = Tariff::where('id', $this->tariff_id)->first();
        $this->corporate_client->tariff_id = $newTariff->id;
        $this->corporate_client->save();
        $clientMainService = ClientMainServices::where('corporate_client_id', $this->corporate_client->id)->first(); // TO DO
        $clientMainService->tariff_id = $newTariff->id;
        $clientMainService->save();
        return redirect('/business-cabinet')->with('status', 'Request for tariff change sent successfully.');
    }
}
