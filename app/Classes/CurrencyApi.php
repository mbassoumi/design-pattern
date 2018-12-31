<?php
/**
 * Created by PhpStorm.
 * User: majdbassoumi
 * Date: 31/12/2018
 * Time: 15:09
 */

namespace App\Classes;


use App\Currency;
use App\CurrencyName;
use Illuminate\Support\Facades\DB;

class CurrencyApi
{

    public function getAllCurrencies()
    {
        $url = "https://free.currencyconverterapi.com/api/v6/currencies";
        $response = $this->sendApiRequest($url);
        return $response;
    }

    public function getRateForCurrency($code)
    {
        $url = "https://free.currencyconverterapi.com/api/v6/convert?q=USD_{$code}&compact=y";
        $response = $this->sendApiRequest($url);
        return $response;

    }

    public function sendApiRequest($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $results = [];
        if (!$err) {
            $results = json_decode($response, true);
        }
        return $results;
    }
}
