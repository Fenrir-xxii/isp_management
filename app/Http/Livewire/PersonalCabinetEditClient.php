<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndividualClient;

class PersonalCabinetEditClient extends Component
{
    public $individual_client;
    public $first_name = '';
    public $last_name = '';
    public $phone = '';
    // public $email = '';
    protected $rules = [
        'first_name' => 'required|min:1',
        'last_name' => 'required|min:1',
        'phone' => 'required',
        // 'email' => 'required|email:rfc,dns|unique:users',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount(IndividualClient $client)
    {
        //dd($client);
        $this->individual_client = $client;
        $this->first_name = $this->individual_client->first_name;
        $this->last_name = $this->individual_client->last_name;
        $this->phone = $this->individual_client->phone;
        // $this->email = $this->individual_client->e_mail;
    }
    public function render()
    {
        return view('livewire.personal-cabinet-edit-client');
    }
    public function register()
    {
        $this->individual_client->validate();
        
        $this->individual_client->first_name = $this->first_name;
        $this->individual_client->last_name = $this->last_name;
        $this->individual_client->phone = $this->phone;
        // $this->individual_client->e_mail = $this->email;
        $this->individual_client->save();
        return redirect()->to('/personal-cabinet');
    }
}
