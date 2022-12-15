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

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'allTour' => Tour::status('1')->with('location')->get()
        ];
        return view('front.pages.all_other_tours.index',$this->outputData);
    }

    public function toursListing($id){
        $this->outputData['listing'] = Vehicle::where('tour_id',$id)->with('tours')->get();
        $this->outputData['tourName'] = Tour::select('name','banner_img','description')->findOrfail($id);
      return view('front.pages.listing.index',$this->outputData);
    }
}
