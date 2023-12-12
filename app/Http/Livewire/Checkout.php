<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LiqPay;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CorporateClient;
use App\Models\IndividualClient;

class Checkout extends Component
{
    // private $public_key = env('LIQPAY_PUBLIC_KEY');
    // private $private_key = env('LIQPAY_PRIVATE_KEY');
    public $data;
    public $signature;
    public $status = 'not payed';
    protected $listeners = [
        'statusUpdated' => 'setStatus'
   ];
   public $paymentAmount;
   public User $user;
   public ?IndividualClient $individual_client = null;
   public ?CorporateClient $corporate_client = null;
    public function mount($amount, $description)
    {
        $public_key = env('LIQPAY_PUBLIC_KEY');
        $private_key = env('LIQPAY_PRIVATE_KEY');
        $liqpay = new LiqPay($public_key, $private_key);
        $params = array(
            'action'         => 'pay',
            'amount'         => $amount,
            'currency'       => 'UAH',
            'description'    => $description,
            'order_id'       => uniqid(),
            'version'        => '3'
        );
        $html = $liqpay->cnb_form($params);
        $dataArr = $liqpay->cnb_form_raw($params);
        $this->data = $dataArr['data'];
        $this->signature = $dataArr['signature'];
        $this->paymentAmount = $amount;
        $this->user = User::where('id', Auth::id())->first();
        if(is_null($this->user->individual_client_id)){
            $this->corporate_client = CorporateClient::where('id', $this->user->corporate_client_id)->first();
        }
        else{
            $this->individual_client = IndividualClient::where('id', $this->user->individual_client_id)->first();
        }
       
    }
    public function render()
    {
        return view('livewire.checkout')->layout('layouts.liqpay.checkout');
    }
    public function setStatus($paymentStatus)
    {
        if(!is_null($paymentStatus))
        {
            $this->status = $paymentStatus;
            if($this->status === 'success'){
                $payment = new Payment();
                $payment->datetime =  now();
                $payment->individual_client_id = is_null($this->individual_client) ? null : $this->individual_client->id;
                $payment->corporate_client_id = is_null($this->corporate_client) ? null : $this->corporate_client->id;
                $payment->amount = $this->paymentAmount;
                $payment->balance_before = is_null($this->individual_client) ? $this->corporate_client->balance : $this->individual_client->balance;
                $payment->balance_after = is_null($this->individual_client) ? ($this->corporate_client->balance + $this->paymentAmount) : ($this->individual_client->balance + $this->paymentAmount);
                $payment->save();

                if(is_null($this->individual_client)){
                    $this->corporate_client->balance += $this->paymentAmount;
                    $this->corporate_client->save();
                }
                else{
                    $this->individual_client->balance += $this->paymentAmount;
                    $this->individual_client->save();
                }
            }
        }
        if(is_null($this->individual_client))
        {
            return redirect()->to(route('business-cabinet'));
        }
        return redirect()->to(route('personal-cabinet'));
    }
}
