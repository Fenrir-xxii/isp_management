<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\IndividualClient;
use App\Models\CorporateClient;
use App\Models\Traffic;

class DailyTrafficUsageTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-traffic-usage-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        /**
         * 1. find all active corp & individual clients 
         * 2. set random traffic for each client
         * 3. insert traffic into db
        */

        $active_corp_clients = CorporateClient::where('status_id', 1)->get();
        $active_indiv_clients = IndividualClient::where('status_id', 1)->get();
        foreach ($active_corp_clients as $corp) {
            $traffic = new Traffic();
            $traffic->downloaded_bytes = rand(300000000, 10000000000); // ~ 0.3Gb to ~10Gb
            $traffic->uploaded_bytes = rand(100000000, 4000000000);  // ~0.1Gb to ~4Gb
            $traffic->individual_client_id = null;
            $traffic->corporate_client_id = $corp->id;
            $traffic->datetime = now();
            $traffic->save();
        }
        foreach($active_indiv_clients as $indiv)
        {
            $traffic = new Traffic();
            $traffic->downloaded_bytes = rand(800000000, 15000000000); // ~0.8Gb to ~15Gb
            $traffic->uploaded_bytes = rand(100000000, 7000000000);  // ~0.1Gb to ~7Gb
            $traffic->individual_client_id = $indiv->id;
            $traffic->corporate_client_id = null;
            $traffic->datetime = now();
            $traffic->save();
        }
    }
}
