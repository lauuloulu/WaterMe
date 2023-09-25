<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlantWaterCountdown extends Component
{
   
    public $plantName;
    public $nextWateringDate;

    public function __construct($plantName, $nextWateringDate)
    {
        $this->plantName = $plantName;
        $this->nextWateringDate = $nextWateringDate;
    }

    
    public function render(): View|Closure|string
    {
        return view('components.plant-water-countdown');
    }
}
