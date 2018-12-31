<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyName extends Model
{
    //
    protected $table = 'currencies_name';

    protected $casts = [
    ];

    public $timestamps = false;
    protected $fillable = ['currency_id', 'name', 'lang'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
