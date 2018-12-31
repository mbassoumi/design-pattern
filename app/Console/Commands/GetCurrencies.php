<?php

namespace App\Console\Commands;

use App\Classes\CurrencyApi;
use App\Currency;
use App\CurrencyName;
use App\Repositories\CurrencyServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     *
     */

    protected $service;

    protected $signature = 'currency:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get list of currencies and seed it to DB';

    /**
     * GetCurrencies constructor.
     * @param CurrencyServiceInterface $currencyService
     */
    public function __construct(CurrencyServiceInterface $currencyService)
    {
        parent::__construct();
        $this->service = $currencyService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $results = $this->service->all();

        foreach ($results['results'] as $currency) {
            $temp_currency = [
                'code' => $currency['id'],
                'symbol' => array_get($currency, 'currencySymbol', null),
                'rate' => 0,
            ];
            $temp = Currency::query()->updateOrCreate($temp_currency);

            CurrencyName::query()->firstOrCreate(
                [
                    'currency_id' => $temp->id,
                    'lang' => 'en',
                ],
                [
                    'name' => $currency['currencyName'],
                ]);

            CurrencyName::query()->firstOrCreate(
                [
                    'currency_id' => $temp->id,
                    'lang' => 'ar',
                ],
                [
                    'name' => $currency['currencyName'] . ' عربي ',
                ]);

        }
    }
}
