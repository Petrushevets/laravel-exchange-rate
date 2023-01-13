<?php

namespace App\Services;

use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    private const URL_Exchange_Rates = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';

    /**
     * Creates or updates exchange rates
     *
     * @return void
     */
    public function CreateOrUpdateRates(): void
    {
        $rates = $this->getExchangeRates();

        foreach ($rates as $rate) {
            ExchangeRate::updateOrCreate(
                ['cc' => $rate['cc']],
                $rate
            );
        }
    }

    /**
     * Get exchange rates
     *
     * @return mixed
     */
    private function getExchangeRates(): mixed
    {
        return Http::get(self::URL_Exchange_Rates)->json();
    }
}
