<?php namespace interactivesolutions\rivile\app\console\commands;

use interactivesolutions\honeycombcore\commands\HCCommand;
use interactivesolutions\rivile\database\models\I04Ath;

class GetPayments extends HCCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rivile:get-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'GET_I04_LIST - import or update';

    /**
     * Initializing data
     */
    public function handle ()
    {
        if (I04Ath::count() > 0)
            $this->call('rivile:update-payments');
        else
            $this->call('rivile:import-payments');
    }
}