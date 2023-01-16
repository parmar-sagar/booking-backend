<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Vehicle;
use App\Models\Tour;

class AlltoursController extends Controller
{
    const ControllerCode = "AT_";
    public $outputData = [];
    
    public function index(){
        $this->outputData = [
            'allTour' => Tour::status()->with('location')->get()
        ];
        return view('front.pages.all_other_tours.index',$this->outputData);
    }

    public function toursListing($id){
        $tourId = Tour::where('random_id',$id)->select('id')->first();
        $this->outputData['listing'] = Vehicle::where('tour_id',$tourId->id)->with('tour')->get();
        $this->outputData['tourName'] = Tour::select('name','banner_img','description')->where('random_id',$id)->first();
      return view('front.pages.listing.index',$this->outputData);
    }
}
