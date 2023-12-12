<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndividualClient;
use App\Models\Payment;

class PersonalCabinetFinance extends Component
{
    public $individual_client;
    public $amount;
    public $description;
    public $payments = array();
    public function mount(IndividualClient $client)
    {
        $this->individual_client = $client;
        $this->payments = Payment::where('individual_client_id', $this->individual_client->id)->get();
        // $this->payments = $client->payments();
    }
    public function render()
    {
        return view('livewire.personal-cabinet-finance');
    }
    public function checkout(){
        return redirect()->to(route('checkout', ["amount" => $this->amount, "description" => $this->description]));
    }
}
