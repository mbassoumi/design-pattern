<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //

    protected $table = 'currencies';

    protected $fillable = ['code', 'symbol', 'rate', 'created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    public function translation()
    {
        return $this->hasMany(CurrencyName::class);
    }

    public function getName($value = null)
    {
        $lang = (is_null($value) ? \App::getLocale() : $value);
        $trans_name = $this->translation()->where('lang', $lang)->first();
        return optional($trans_name)->name;
    }


}
