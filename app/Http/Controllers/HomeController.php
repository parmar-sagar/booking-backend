<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Handlers\Error;
use App\Models\Vehicle;
use App\Models\Discount;
use App\Models\Tour;

class HomeController extends Controller
{
    const ControllerCode = "H_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'imgVideo' => HomeSlider::status('1')->select('image_video','type')->order()->get(),
            'discount' => Discount::order()->get(),
            'deal' => Vehicle::where('is_deals','1')->sequence()->status('1')->get()
        ];

        $tour = Tour::status('1')->with('location')->take(3)->get();
        $res= array();
        foreach($tour as $key => $value){
              $res[$key]['tour_id'] = $value->id;
              $res[$key]['tour_name'] = $value->name;
              $res[$key]['location'] = $value['location']->name;
              $res[$key]['veh'] = Vehicle::where('tour_id',$value->id)->status('1')->order()->get()->toArray();
        }
        $this->outputData['tourVehicles'] = $res;
        return view('front.pages.home',$this->outputData);
    }
}
