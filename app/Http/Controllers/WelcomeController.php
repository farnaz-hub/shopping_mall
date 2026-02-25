<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use App\Services\WelcomeService;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function greeting()
    {
        return \App\Facades\Welcome::hello();
    }
}
