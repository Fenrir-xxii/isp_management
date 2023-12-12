<?php

namespace App\Services;

use App\Http\Livewire\ClientAdditionalOptions;
use App\Models\AdditionalOption;
use App\Models\CorporateClient;
use App\Models\IndividualClient;
use App\Models\Tariff;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\ClientAdditionalServices;
use App\Models\ClientMainServices;
use App\Models\Payment;
use App\Models\Traffic;
use Illuminate\Support\Facades\DB;

class DashboardStatService
{
    private $_corporate_clients;
    private $_individual_clients;
    private $_tariffs;
    private $_additional_options;
    // private $_received_payments;
    public function __construct()
    {
        // To do only active clients
        $this->_corporate_clients = CorporateClient::all();
        $this->_individual_clients = IndividualClient::all();
        $this->_tariffs = Tariff::all();
        $this->_additional_options = AdditionalOption::all();
        // $this->_received_payments = Payment::all();
    }
    public function getMainMonthlyIncomeIndividualClients()
    {
        $totalIncome = 0;
        foreach ($this->_individual_clients as $client) {
            $totalIncome += $client->tariff->price;
        }
        return $totalIncome;
    }
    public function getMainMonthlyIncomeCorporateClients(): float
    {
        $totalIncome = 0;
        foreach ($this->_corporate_clients as $client) {
            $totalIncome += $client->tariff->price;
        }
        return $totalIncome;
    }

    public function getMainMonthlyIncomeTotal(): float
    {
        return $this->getMainMonthlyIncomeIndividualClients() + $this->getMainMonthlyIncomeCorporateClients();
    }
    // public function getAdditionalMonthlyIncome(): float
    // {
    //     $totalIncome = 0;
    //     $additionalOptions = ClientAdditionalServices::all()->pluck('additional_option_id')->toArray(); // TO DO only active
    //     foreach($additionalOptions as $option_id)
    //     {
    //         $option = $this->_additional_options->firstWhere('id', $option_id);
    //         if(!is_null($option)){
    //             $totalIncome += $option->price;
    //         }
    //     }
    //     return $totalIncome;
    // }
    public function getIndividualAdditionalMonthlyIncome(): float
    {
        $totalIncome = 0;
        $individ_clients_main_services_ids = ClientMainServices::whereNotNull('individual_client_id')->pluck('id')->toArray();
        $additionalOptions = ClientAdditionalServices::whereIn('client_main_service_id', $individ_clients_main_services_ids)->pluck('additional_option_id')->toArray();
        foreach ($additionalOptions as $option_id) {
            $option = $this->_additional_options->firstWhere('id', $option_id);
            if (!is_null($option)) {
                $totalIncome += $option->price;
            }
        }
        return $totalIncome;
    }
    public function getCorporateAdditionalMonthlyIncome(): float
    {
        $totalIncome = 0;
        $corp_clients_main_services_ids = ClientMainServices::whereNotNull('corporate_client_id')->pluck('id')->toArray();
        $additionalOptions = ClientAdditionalServices::whereIn('client_main_service_id', $corp_clients_main_services_ids)->pluck('additional_option_id')->toArray();
        // var_dump($corp_clients_main_services_ids); die();
        foreach ($additionalOptions as $option_id) {
            $option = $this->_additional_options->firstWhere('id', $option_id);
            if (!is_null($option)) {
                $totalIncome += $option->price;
            }
        }
        return $totalIncome;
    }
    public function getAdditionalMonthlyIncomeTotal(): float
    {
        return $this->getIndividualAdditionalMonthlyIncome() + $this->getCorporateAdditionalMonthlyIncome();
    }
    public function getOverallMonthlyIncome(): float
    {
        return $this->getMainMonthlyIncomeTotal() + $this->getAdditionalMonthlyIncomeTotal();
    }
    public function getIndividualClientsCount()
    {
        return Count($this->_individual_clients);
    }
    public function getCorporateCLientsCount()
    {
        return Count($this->_corporate_clients);
    }
    public function getAllClientsCount()
    {
        return $this->getIndividualClientsCount() + $this->getCorporateCLientsCount();
    }
    public function getNewIndividualClientsCount()
    {
        // new for current month
        // $date_min = "2023-12-01";
        // $date_max = "2023-12-31";
        $from = date('Y-m-01', strtotime(now()));
        $to = date('Y-m-t', strtotime(now()));
        return Count(IndividualClient::whereBetween('created_at', [$from, $to])->get());
    }
    public function getNewCorporateClientsCount()
    {
        $from = date('Y-m-01', strtotime(now()));
        $to = date('Y-m-t', strtotime(now()));
        return Count(CorporateClient::whereBetween('created_at', [$from, $to])->get());
    }
    public function getNewClientsTotalCount()
    {
        return $this->getNewIndividualClientsCount() + $this->getNewCorporateClientsCount();
    }
    public function getLastSixMonthIncome(): array
    {
        // no data
        return [0, 0, 200, 700, 950, 1275];
    }
    public function getLastSevenDaysDonwloadedTraffic()
    {
        // TO DO
        $from = date('Y-m-d', strtotime('-7 days'));
        $to = date('Y-m-d');
        // $traffic = Traffic::whereBetween('datetime', [$from, $to])->groupBy('datetime')->pluck('downloaded_bytes');
        $traffic = DB::table('traffic')
                ->selectRaw('SUM(downloaded_bytes) as traffic')
                ->havingBetween('datetime', [$from, $to])
                ->groupBy('datetime')
                ->pluck('traffic');
        // var_dump($traffic);
        // die();
        $trafficArray = array();
        foreach ($traffic as $t) {
            $trafficArray[] = round($t / 1000000000, 1);
        }
        // var_dump($trafficArray);
        // die();
        return $trafficArray;
        // return [92.6, 110.5, 73.8, 144.6, 96.8, 152.1, 123.3];
    }
    public function getLastSevenDaysUploadedTraffic()
    {
        // TO DO
        $from = date('Y-m-d', strtotime('-7 days'));
        $to = date('Y-m-d');
        // $traffic = Traffic::whereBetween('datetime', [$from, $to])->groupBy('datetime')->pluck('uploaded_bytes');
        $traffic = DB::table('traffic')
        ->selectRaw('SUM(uploaded_bytes) as traffic')
        ->havingBetween('datetime', [$from, $to])
        ->groupBy('datetime')
        ->pluck('traffic');
        $trafficArray = array();
        foreach ($traffic as $t) {
            $trafficArray[] = round($t / 1000000000, 1);
        }
        return $trafficArray;
        // return [42.6, 40.5, 33.8, 54.6, 66.8, 18.1, 23.3];
    }
    public function getLastSevenDaysLabels()
    {
        // TO DO
        $from = date('Y-m-d', strtotime('-7 days'));
        $to = date('Y-m-d');
        $labels = Traffic::whereBetween('datetime', [$from, $to])->groupBy('datetime')->pluck('datetime');
        // var_dump($labels); die();
        $labelsArray = array();
        foreach ($labels as $l) {
            $labelsArray[] = date_format(date_create($l), 'Y-m-d');
        }
        return $labelsArray;
        //return ['01.12.23', '02.12.23', '03.12.23', '04.12.23', '05.12.23', '06.12.23', '07.12.23'];
    }
    public function getLastFiveReceivedPayments()
    {
        return Payment::where('amount', '>', 0)->orderBy('datetime', 'DESC')->take(5)->get();
    }


    public function findObjectById($id, $array)
    {
        if (isset($array[$id])) {
            return $array[$id];
        }
        // var_dump($array); die();
        return false;
    }
}
