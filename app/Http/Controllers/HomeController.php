<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Discount;
use App\Models\Slider;
use App\Models\Tour;

class HomeController extends Controller{

    const ControllerCode = "H_";
    public $outputData = [];

    public function index(){
        $sliders = Slider::select('image_video','type')->active()->sequence()->get();
        $discounts = Discount::order()->get();
        $deals = Vehicle::deals()->sequence()->active()->get();

        $tours = Tour::active()->take(3)->Sequence()->get();

        $this->outputData = [
            'sliders' => $sliders,
            'discounts' => $discounts,
            'deals' => $deals,
            'tours' => $tours
        ];
        return view('front.pages.home',$this->outputData);
    }
}
