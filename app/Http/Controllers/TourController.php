<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TourController extends Controller{
    
    public $outputData = [];

    public function index(){
        $tours = Tour::active()->sequence()->get();
        
        $this->outputData['tours'] = $tours;

        return view('front.pages.tour.list',$this->outputData);
    }

    public function details($id){
        $objTour = Tour::select('id','name','banner_img','description')->where('random_id',$id)->first();
        $vehicles = Vehicle::where('tour_id',$objTour->id)->active()->sequence()->get();

        $this->outputData = [
            'objTour' => $objTour,
            'vehicles' => $vehicles  
        ];

        return view('front.pages.tour.detail',$this->outputData);
    }
}
