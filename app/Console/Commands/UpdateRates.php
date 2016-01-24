<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mukuru\Services\UpdateRatesService;

class UpdateRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the current exchange rates from currencylayer.com';

    /**
     * The service used to update the rates
     *
     * @var UpdateRatesService
     */
    protected $updateRatesService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UpdateRatesService $updateRatesService)
    {
        parent::__construct();

        $this->updateRatesService = $updateRatesService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if($this->updateRatesService->update()) {
            $this->info('Rates successfully updated');
        }else{
            $this->error($this->updateRatesService->getErrors());
        }
    }
}
