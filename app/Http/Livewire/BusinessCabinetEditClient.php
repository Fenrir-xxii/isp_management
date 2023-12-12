<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CorporateClient;

class BusinessCabinetEditClient extends Component
{
    public $corporate_client;
    public $name = '';
    public $crn = '';
    public $phone = '';
    // public $email = '';
    public $company_contact = '';
    protected $rules = [
        'name' => 'required|min:3',
        'crn' => 'required|numeric|min:4',
        'phone' => 'required',
        'company_contact' => 'required|min:1',
        // 'email' => 'required|email:rfc,dns|unique:users',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount(CorporateClient $client)
    {
        //dd($client);
        $this->corporate_client = $client;
        $this->name = $this->corporate_client->name;
        $this->crn = $this->corporate_client->crn;
        $this->phone = $this->corporate_client->phone;
        // $this->email = $this->corporate_client->e_mail;
        $this->company_contact = $this->corporate_client->contact_name;
    }
    public function render()
    {
        return view('livewire.business-cabinet-edit-client');
    }
    public function register()
    {
        $this->corporate_client->validate();

        $this->corporate_client->name = $this->name;
        $this->corporate_client->crn = $this->crn;
        $this->corporate_client->phone = $this->phone;
        // $this->corporate_client->e_mail = $this->email;
        $this->corporate_client->contact_name = $this->company_contact;
        $this->corporate_client->save();
        return redirect()->to('/business-cabinet');
    }
}
