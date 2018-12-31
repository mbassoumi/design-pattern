<?php
/**
 * Created by PhpStorm.
 * User: majdbassoumi
 * Date: 31/12/2018
 * Time: 15:07
 */

namespace App\Repositories;


use App\Classes\CurrencyApi;
use App\Currency;
use Carbon\Carbon;

class CurrencyService implements CurrencyServiceInterface
{

    private $max_diff_minutes = 5;

    public function all()
    {
        // TODO: Implement all() method.
        return app()->make(CurrencyApi::class)->getAllCurrencies();
    }

    public function rate(string $code)
    {
        // TODO: Implement rate() method.
        $currency = Currency::query()->where('code', $code)->first();
        $current_date = Carbon::now();
        $minutes_diff = $current_date->diffInMinutes($currency->updated_at);
        if ($minutes_diff >= $this->max_diff_minutes){
            $rate = app()->make(CurrencyApi::class)->getRateForCurrency($code);
            $value = (count($rate) ?$rate["USD_{$code}"]['val']: null);
            $currency->rate = $value;
            $currency->save();
        }else{
            $value = $currency->rate;
        }
        return $value;
    }

}
