<?php

namespace App\Console\Commands;

use App\Services\ExchangeRateService;
use ErrorException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;

class UpdateExchangeRate extends Command
{
    private ExchangeRateService $service;

    /**
     * @param ExchangeRateService $service
     */
    public function __construct(
        ExchangeRateService $service,
    ) {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update exchange rate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->service->CreateOrUpdateRates();
            $this->info('Exchange rates are updated.');
        } catch (RequestException|ErrorException) {
            $this->error('Exchange rates service is not available.');
        }
    }
}
