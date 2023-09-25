<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class PlantWaterCountdown extends Component
{
    public $plantName;
    public $daysLeft; 
    public $plantImage;
    public $editRoute;
    
    public function __construct($plantName, $nextWateringDate, $plantImage, $editRoute)
    {
        $this->plantName = $plantName;
        $this->plantImage = $plantImage;
        $this->registro = $editRoute;

        $today = Carbon::now();
        $nextWatering = Carbon::parse($nextWateringDate);
        $this->daysLeft = $today->diffInDays($nextWatering);
    }

    public function render(): View
    {
        return view('components.plant-water-countdown');
    }
}
