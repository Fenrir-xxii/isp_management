<?php

namespace App\Console\Commands;

use App\Models\AdditionalOption;
use Illuminate\Console\Command;
use App\Models\Payment;
use App\Models\IndividualClient;
use App\Models\CorporateClient;
use App\Models\Tariff;
use App\Models\ClientMainServices;
use App\Models\ClientAdditionalServices;

class MonthlySubscriptionTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:monthly-subscription-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserting into DB money withdrawal from client`s accounts for provided services';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        /**
         * 1. list all active corp & individual clients
         * 2. get amount for tariff and add option
         * 3. insert into db payments with minus
         * 4. take off charge from client`s balance
         */
        $active_corp_clients = CorporateClient::where('status_id', 1)->get();
        $active_indiv_clients = IndividualClient::where('status_id', 1)->get();
        $all_tariffs = Tariff::all();
        $all_additional_options = AdditionalOption::all();
        
        //1
        foreach ($active_corp_clients as $corp) {
            $totalAmount = 0;
            $tariff = $this->findObjectById($corp->tariff_id, $all_tariffs);
            
            //2
            if($tariff){
                $totalAmount += $tariff->price;
            }
            // to do with add options
            $mainService = ClientMainServices::where('corporate_client_id', $corp->id)->first();
            $additional_services = ClientAdditionalServices::where('client_main_service_id', $mainService->id)->pluck('additional_option_id')->toArray();
            foreach($additional_services as $add_service)
            {
                $addOption = $this->findObjectById($add_service->id, $all_additional_options);
                if($addOption){
                    $totalAmount += $addOption->price;
                }
            }

            $totalAmount *= -1;
            
            //3
            $paymentCharge = new Payment();
            $paymentCharge->datetime = now();
            $paymentCharge->corporate_client_id = $corp->id;
            $paymentCharge->individual_client_id = null;
            $paymentCharge->amount = $totalAmount;
            $paymentCharge->balance_before = $corp->balance;
            $paymentCharge->balance_after = $corp->balance + $totalAmount;
            $paymentCharge->save();
            
            //4
            $corp->balance += $totalAmount;
            $corp->save();
        }
        foreach ($active_indiv_clients as $indiv) {
            $totalAmount = 0;
            $tariff = $this->findObjectById($indiv->tariff_id, $all_tariffs);

            if($tariff){
                $totalAmount += $tariff->price;
            }
            // to do with add options
            $totalAmount *= -1;

            $paymentCharge = new Payment();
            $paymentCharge->datetime = now();
            $paymentCharge->corporate_client_id = null;
            $paymentCharge->individual_client_id = $indiv->id;
            $paymentCharge->amount = $totalAmount;
            $paymentCharge->balance_before = $indiv->balance;
            $paymentCharge->balance_after = $indiv->balance + $totalAmount;
            $paymentCharge->save();

            $indiv->balance += $totalAmount;
            $indiv->save();
        }
    }
    function findObjectById($id, $array)
    {
        if (isset($array[$id])) {
            return $array[$id];
        }

        return false;
    }
}
