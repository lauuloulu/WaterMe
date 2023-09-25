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
    
    public function __construct($plantName, $nextWateringDate, $plantImage)
    {
        $this->plantName = $plantName;
        $this->plantImage = $plantImage;

        $today = Carbon::now();
        $nextWatering = Carbon::parse($nextWateringDate);
        $this->daysLeft = $today->diffInDays($nextWatering);
    }

    public function render(): View
    {
        return view('components.plant-water-countdown');
    }
}
