<?php

namespace App\Http\Controllers;

use App\currency;
use App\Repositories\CurrencyService;
use App\Repositories\CurrencyServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    protected $service;

    public function __construct(CurrencyServiceInterface $currencyService)
    {
        $this->service = $currencyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = $this->service->all();
        return response()->json([
            'data' => $currencies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $rate = $this->service->rate($code);
        return response()->json([
            'data' => $rate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\currency $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\currency $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(currency $currency)
    {
        //
    }



    public function listAllCurrencies()
    {
        $currencies = Currency::with('translation')->get();
        $result = [];
        foreach ($currencies as $index => $currency){
            $result[$index]['code'] = $currency->code;
            $result[$index]['symbol'] = $currency->symbol;
            $result[$index]['rate'] = $currency->rate;
            $result[$index]['updated_at'] = $currency->updated_at;
            $result[$index]['name'] = $currency->getName('en');
        }
        return response()->json([
            'data' => $result
        ]);
    }

    public function showRate($code)
    {
        $currency = Currency::where('code', '=', $code)->first();
        $rate = null;
        if ($currency) {
            $rate = $currency->rate;
        }
        return response()->json([
            'data' => [
                'value' => $rate
            ]
        ]);
    }

    public function listAllCurrencyFromService()
    {
        $currencies = $this->service->all();
        return response()->json([
            'data' => $currencies
        ]);
    }

    public function showRateFromService($code)
    {
        $rate = $this->service->rate($code);
        return response()->json([
            'data' => $rate
        ]);
    }



    public function majd()
    {
        $date = Carbon::parse('2018-12-31 14:01:45');
        $diff_date = Carbon::now();
        dd($date->diffInMinutes($diff_date));
        dd($date, $diff_date);
        $rate = $this->service->rate('PHP');
        return $rate;
    }


}
