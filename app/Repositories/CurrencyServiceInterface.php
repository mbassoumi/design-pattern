<?php
/**
 * Created by PhpStorm.
 * User: majdbassoumi
 * Date: 31/12/2018
 * Time: 15:05
 */

namespace App\Repositories;


interface CurrencyServiceInterface
{
    public function all();

    public function rate(string $code);

}
