<?php

namespace App\Http\Livewire;

use App\Models\AdditionalOption;
use Livewire\Component;
use App\Models\IndividualClient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientMainServices;
use App\Models\ClientAdditionalServices;

class PersonalCabinet extends Component
{
    public User $user;
    public $individual_client;
    public $additionalOptions = array();
    public $tariffPageShow = false;
    public $financePageShow = false;

    public function mount()
    {
        $this->user = User::where('id', Auth::id())->first();
        $this->individual_client = IndividualClient::where('id', $this->user->individual_client_id)->first();
        $client_main_services_ids = ClientMainServices::where('individual_client_id', $this->individual_client->id)->pluck('id')->toArray();
        $additionalOptions_ids = ClientAdditionalServices::whereIn('client_main_service_id', $client_main_services_ids)->pluck('additional_option_id')->toArray();
        $this->additionalOptions = AdditionalOption::where('id', $additionalOptions_ids)->get();
    }
    public function render()
    {
        // return view('livewire.personal-cabinet')->layout('layouts.cabinet.personal');
        return view('livewire.personal-cabinet');
        // return view('livewire.profile');
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
