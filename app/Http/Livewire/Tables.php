<?php

namespace App\Http\Livewire;

use App\Models\IndividualClient;
use Livewire\Component;

class Tables extends Component
{
    public $individual_clients;
    public function __construct()
    {
        //
        // $this->individual_clients=$data;
        $this->individual_clients=IndividualClient::all();
    }
    public function render()
    {
        // $this->getIndividualClients();
        return view('livewire.tables');
    }
    public function getIndividualClients(){
        // $this->individual_clients = IndividualClient::all();

        // $this->individual_clients = new IndividualClient();
        // $this->individual_clients->first_name = "John";
        // $this->individual_clients->last_name = "Doe";
        // $this->individual_clients->age = 29;
    }
}
