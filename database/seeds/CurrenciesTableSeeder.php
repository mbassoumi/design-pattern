<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('currencies')->insert([
            [
                'id' => 1,
                'code' => 'ALL',
                'symbol' => 'Lek',
                'rate' => 107.849865,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'code' => 'XCD',
                'symbol' => '$',
                'rate' => 2.70255,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 3,
                'code' => 'EUR',
                'symbol' => '€',
                'rate' => 0.873635,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 4,
                'code' => 'HUF',
                'symbol' => 'Ft',
                'rate' => 280.459683,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],

        ]);

        \Illuminate\Support\Facades\DB::table('currencies_name')->insert([
            [
                'currency_id' => 1,
                'name' => 'Albanian Lek',
                'lang' => 'en',
            ],

            [
                'currency_id' => 1,
                'name' => 'Albanian Lek عربي',
                'lang' => 'ar',
            ],

            [
                'currency_id' => 2,
                'name' => 'East Caribbean Dollar',
                'lang' => 'en',
            ],
            [
                'currency_id' => 2,
                'name' => 'East Caribbean Dollar عربي',
                'lang' => 'ar',
            ],

            [
                'currency_id' => 3,
                'lang' => 'en',
                'name' => 'Euro'
            ],
            [
                'currency_id' => 3,
                'lang' => 'ar',
                'name' => 'Euro عربي'
            ],

            [
                'currency_id' => 4,
                'lang' => 'en',
                'name' => 'Hungarian Forint',
            ],
            [
                'currency_id' => 4,
                'lang' => 'ar',
                'name' => 'Hungarian Forint عربي',
            ],


        ]);
    }
}
