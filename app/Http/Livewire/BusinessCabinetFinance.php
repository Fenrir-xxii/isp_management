<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CorporateClient;
use App\Models\Payment;

class BusinessCabinetFinance extends Component
{
    public $corporate_client;
    public $amount;
    public $description;
    public $payments = array();
    public function mount(CorporateClient $client)
    {
        $this->corporate_client = $client;
        $this->payments = Payment::where('corporate_client_id', $this->corporate_client->id)->get();
        // $this->payments = $client->payments();
    }
    public function render()
    {
        return view('livewire.business-cabinet-finance');
    }
    public function checkout(){
        return redirect()->to(route('checkout', ["amount" => $this->amount, "description" => $this->description]));
    }

}
