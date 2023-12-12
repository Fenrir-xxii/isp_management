<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CorporateClient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientMainServices;
use App\Models\ClientAdditionalServices;
use App\Models\AdditionalOption;

class BusinessCabinet extends Component
{
    public User $user;
    public $corporate_client;
    public $additionalOptions = array();
    public $tariffPageShow = false;
    public $financePageShow = false;

    public function mount()
    {
        $this->user = User::where('id', Auth::id())->first();
        $this->corporate_client = CorporateClient::where('id', $this->user->corporate_client_id)->first();
        $client_main_services_ids = ClientMainServices::where('corporate_client_id', $this->corporate_client->id)->pluck('id')->toArray();
        $additionalOptions_ids = ClientAdditionalServices::whereIn('client_main_service_id', $client_main_services_ids)->pluck('additional_option_id')->toArray();
        $this->additionalOptions = AdditionalOption::where('id', $additionalOptions_ids)->get();
    }
    public function render()
    {
        return view('livewire.business-cabinet');
    }
    public function showTariffPage()
    {
        $this->financePageShow = false;
        $this->tariffPageShow = true;
    }
    public function showFinancePage()
    {
        $this->tariffPageShow = false;
        $this->financePageShow = true;
    }
    public function showGeneralPage()
    {
        $this->tariffPageShow = false;
        $this->financePageShow = false;
    }
}
