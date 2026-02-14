<?php

namespace App\View\Components;

use App\Models\City;
use App\Models\Province;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProvinceCity extends Component
{

    public $provinces;
    public $cities;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->provinces = Province::all();
        $this->cities = City::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.province-city');
    }
}
