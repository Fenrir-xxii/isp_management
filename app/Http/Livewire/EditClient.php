<?php

namespace App\Http\Livewire;

use App\Models\CorporateClient;
use App\Models\IndividualClient;
use Livewire\Component;
use App\Models\Tariff;
use App\Models\AdditionalOption;

class EditClient extends Component
{
    // public ?IndividualClient $individual_client = null;
    // public ?CorporateClient $corporate_client = null;
    public $isCorporate = false;
    public $company_id = 0;
    public $company_name = '';
    public $company_crn = '';
    public $company_address = '';
    public $company_phone = '';
    public $company_email = '';
    public $company_balance = '';
    public $company_username = '';
    public $company_contact = '';
    public $company_tariff = 1;
    public $individual_client_id = 0;
    public $individual_first_name = '';
    public $individual_last_name = '';
    public $individual_age = '';
    public $individual_address = '';
    public $individual_phone = '';
    public $individual_email = '';
    public $individual_balance = '';
    public $individual_username = '';
    public $individual_tariff = 1;
    public $tariffs = array();
    // public $additionalOptions = array();
    public $status; // = Status::find(0);
    protected $rules = [
        'company_name' => 'required|min:3',
        'company_crn' => 'required|numeric|min:4',
        'company_address' => 'required',
        'company_phone' => 'required',
        'company_email' => 'required|email:rfc,dns|unique:users',
        'company_balance' => 'required|numeric',
        'company_username' => 'required|min:1',
        'company_contact' => 'required|min:1',
        'company_tariff' => 'required|numeric',
        'individual_first_name' => 'required|min:1',
        'individual_last_name' => 'required|min:1',
        'individual_age' => 'required',
        'individual_address' => 'required',
        'individual_phone' => 'required',
        'individual_email' => 'required|email:rfc,dns|unique:users',
        'individual_balance' => 'required|numeric',
        'individual_username' => 'required|min:1',
        'individual_tariff' => 'required|numeric',
    ];
    public function mount($isCorporate, $id)
    {
        $this->tariffs = Tariff::all();
        // $this->additionalOptions = AdditionalOption::all();
        if ($isCorporate) {
            $corporate_client = CorporateClient::where('id', $id)->first();
            $this->isCorporate = true;
            $this->company_id = $corporate_client->id;
            $this->company_name = $corporate_client->name;
            $this->company_crn = $corporate_client->crn;
            $this->company_address = $corporate_client->address;
            $this->company_phone = $corporate_client->phone;
            $this->company_email = $corporate_client->e_mail;
            $this->company_balance = $corporate_client->balance;
            $this->company_username = $corporate_client->username;
            $this->company_contact = $corporate_client->contact_name;
            $this->company_tariff = $corporate_client->tariff_id;
        } else {
            $individual_client = IndividualClient::where('id', $id)->first();
            $this->isCorporate = false;
            $this->individual_client_id = $individual_client->id;
            $this->individual_first_name = $individual_client->first_name;
            $this->individual_last_name = $individual_client->last_name;
            $this->individual_age = $individual_client->age;
            $this->individual_address = $individual_client->address;
            $this->individual_phone = $individual_client->phone;
            $this->individual_email = $individual_client->e_mail;
            $this->individual_balance = $individual_client->balance;
            $this->individual_username = $individual_client->username;
            $this->individual_tariff = $individual_client->tariff_id;
        }
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.edit-client');
    }
    public function register()
    {
        // TO DO
        if (is_null($this->isCorporate)) 
        {
            $individual_client = IndividualClient::where('id', $this->individual_client_id)->first();
            $individual_client->first_name = $this->individual_first_name;
            $individual_client->last_name = $this->individual_last_name;
            $individual_client->age = $this->individual_age;
            $individual_client->address = $this->individual_address;
            $individual_client->phone = $this->individual_phone;
            $individual_client->e_mail = $this->individual_email;
            $individual_client->balance = $this->individual_balance;
            $individual_client->username = $this->individual_username;
            $individual_client->tariff_id = $this->individual_tariff;
            $individual_client->save();
        } 
        else 
        {
            $corporate_client = CorporateClient::where('id', $this->company_id )->first();
            $corporate_client->name = $this->company_name;
            $corporate_client->crn = $this->company_crn;
            $corporate_client->address = $this->company_address;
            $corporate_client->phone = $this->company_phone;
            $corporate_client->e_mail = $this->company_email;
            $corporate_client->balance = $this->company_balance;
            $corporate_client->username = $this->company_username;
            $corporate_client->contact_name = $this->company_contact;
            $corporate_client->tariff_id = $this->company_tariff;
            $corporate_client->save();
        }
    }
}
