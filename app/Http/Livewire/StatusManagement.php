<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndividualClient;
use App\Models\CorporateClient;

class StatusManagement extends Component
{
    public $individual_clients;
    public $corporate_clients;
    public function mount()
    {
        $this->individual_clients=IndividualClient::all();
        $this->corporate_clients=CorporateClient::all();
    }
    public function render()
    {
        return view('livewire.status-management');
    }
    public function change($id, $isCorporate, $status){
        // To Do
        // dd($status);
        if($isCorporate)
        {
            $client = CorporateClient::where('id', $id)->first();
            if($status['title'] === 'active')
            {
                $client->status_id = 2;
            }
            else{
                $client->status_id = 1;
            }
            $client->save();
        }
        else{
            // dd($status);
            $client = IndividualClient::where('id', $id)->first();
            if($status['title'] === 'active')
            {
                $client->status_id = 2;
            }
            else{
                $client->status_id = 1;
            }
            $client->save();
        }
        return redirect()->route('status-management');
        // return redirect()->back();
        // dd($id);
    }

}
