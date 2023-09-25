<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class PlantWaterCountdown extends Component
{
    public $plantName;
    public $daysLeft; // Cambiamos el nombre de la variable

    public function __construct($plantName, $nextWateringDate)
    {
        $this->plantName = $plantName;

        $today = Carbon::now();
        $nextWatering = Carbon::parse($nextWateringDate);
        $this->daysLeft = $today->diffInDays($nextWatering);
    }

    public function render(): View|Closure|string
    {
        return view('components.plant-water-countdown');
    }
}
