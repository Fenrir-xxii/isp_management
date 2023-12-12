<?php

namespace App\Http\Livewire;

use App\Models\IndividualClient;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\DashboardStatService;

class Dashboard extends Component
{
    protected DashboardStatService $stat;
    public $totalIncome;
    public $individual_clients_income;
    public $corporate_clients_income;
    public $individual_additional_options_income;
    public $corporate_additional_options_income;
    public $additional_options_income;
    public $totalClients;
    public $individual_clients_count;
    public $corporate_clients_count;
    public $new_individual_clients_count;
    public $new_corporate_clients_count;
    public $new_clients_total_count;
    public $last_six_month_income = array();
    public $last_seven_days_donwloaded_traffic = array();
    public $last_seven_days_uploaded_traffic = array();
    public $last_seven_days_labels= array();
    public $roles = array();
    public $last_five_received_payments = array();
    public function render()
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $this->roles = $user->getRoleNames();

        $stat = new DashboardStatService();
        $this->individual_clients_income = $stat->getMainMonthlyIncomeIndividualClients();
        $this->corporate_clients_income = $stat->getMainMonthlyIncomeCorporateClients();
        $this->totalIncome = $stat->getMainMonthlyIncomeTotal();
        // $this->additional_options_income = $stat->getAdditionalMonthlyIncome();
        $this->individual_additional_options_income = $stat->getIndividualAdditionalMonthlyIncome();
        $this->corporate_additional_options_income = $stat->getCorporateAdditionalMonthlyIncome();
        $this->additional_options_income = $stat->getAdditionalMonthlyIncomeTotal();
        $this->totalClients = $stat->getAllClientsCount();
        $this->individual_clients_count = $stat->getIndividualClientsCount();
        $this->corporate_clients_count = $stat->getCorporateCLientsCount();
        $this->new_individual_clients_count = $stat->getNewIndividualClientsCount();
        $this->new_corporate_clients_count = $stat->getNewCorporateClientsCount();
        $this->new_clients_total_count = $stat->getNewClientsTotalCount();
        $this->last_six_month_income = $stat->getLastSixMonthIncome();
        $this->last_seven_days_donwloaded_traffic = $stat->getLastSevenDaysDonwloadedTraffic();
        $this->last_seven_days_uploaded_traffic = $stat->getLastSevenDaysUploadedTraffic();
        $this->last_seven_days_labels = $stat->getLastSevenDaysLabels();
        $this->last_five_received_payments = $stat->getLastFiveReceivedPayments();

        return view('livewire.dashboard');
    }
}
