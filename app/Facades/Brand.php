<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Brand extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'brand';
    }
}
