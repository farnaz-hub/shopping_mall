<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Welcome extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hello';
    }
}
