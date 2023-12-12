<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;
use App\Models\IndividualClient;
use App\Models\CorporateClient;

class ClientManagement extends Component
{
    public $individual_clients;
    public $corporate_clients;
    public function __construct()
    {
        //
        $this->individual_clients=IndividualClient::all();
        $this->corporate_clients=CorporateClient::all();
    }
    public function render()
    {
        return view('livewire.laravel-examples.client-management');
    }
}
