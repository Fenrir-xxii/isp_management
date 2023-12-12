<?php

namespace App\Http\Livewire;

use App\Models\ClientMainServices;
use App\Models\CorporateClient;
use App\Models\IndividualClient;
use Livewire\Component;
use App\Models\Tariff;
use App\Models\Status;

class CreateClient extends Component
{
    public $isCorporate = false;
    public $company_name = '';
    public $company_crn = '';
    public $company_address = '';
    public $company_phone = '';
    public $company_email = '';
    public $company_balance = '';
    public $company_username = '';
    public $company_contact = '';
    public $company_tariff = 1;
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

    public function render()
    {
        $this->tariffs = Tariff::all();
        return view('livewire.create-client');
    }
    public function register()
    {
        $this->status = Status::first();
        if ($this->isCorporate) {
            $company = CorporateClient::create([
                'name' => $this->company_name,
                'crn' => $this->company_crn,
                'address' => $this->company_address,
                'phone' => $this->company_phone,
                'e_mail' => $this->company_email,
                'balance' => $this->company_balance,
                'username' => $this->company_username,
                'contact_name' => $this->company_contact,
                'tariff_id' => $this->company_tariff,
                'status_id' => $this->status->id
            ]);
            ClientMainServices::create([
                'tariff_id' => $this->company_tariff,
                'individual_client_id' => null,
                'corporate_client_id' => $company->id,
                'contract_id' => 1, // TO DO,
                'status_id' => $this->status->id
            ]);
        } else {
            $individual = IndividualClient::create(
                [
                    'first_name' => $this->individual_first_name,
                    'last_name' => $this->individual_last_name,
                    'age' => $this->individual_age,
                    'address' => $this->individual_address,
                    'phone' => $this->individual_phone,
                    'e_mail' => $this->individual_email,
                    'balance' => $this->individual_balance,
                    'username' => $this->individual_username,
                    'tariff_id' => $this->individual_tariff,
                    'status_id' => $this->status->id
                ]
            );
            ClientMainServices::create([
                'tariff_id' => $this->individual_tariff,
                'individual_client_id' => $individual->id,
                'corporate_client_id' =>null,
                'contract_id' => 1, // TO DO,
                'status_id' => $this->status->id
            ]);
        }

        return redirect('/client-management')->with('status', 'New Client successfully created.');
    }
}
