<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\Vehicle;
use App\Models\Tour;
use App\Models\Time;


class SingleProductController extends Controller
{
    const ControllerCode = "S_";

    function __construct(){
        $this->outputData = [];
    }

    public function index($id){   
        $this->outputData = [
            'singlePrdct' => Vehicle::findOrFail($id),
            'list'        => Tour::findOrFail($id)
        ];

       $iIds = Helper::explode($this->outputData['singlePrdct']->includes_ids);
       $hIds = Helper::explode($this->outputData['singlePrdct']->highlight_ids);
       $rIds = Helper::explode($this->outputData['list']->refreshments_ids);
       $sIds = Helper::explode($this->outputData['list']->safety_gear_ids);	
       $tIds = Helper::explode($this->outputData['list']->time_ids);

       $this->outputData['include'] = VehicleInfo::whereIn('id',$iIds)->select('title')->get();
       $this->outputData['notInclude'] = VehicleInfo::whereIn('id',$hIds)->select('title')->get();
       $this->outputData['refreshment'] = VehicleInfo::whereIn('id',$rIds)->select('title')->get();
       $this->outputData['saftyGear'] = VehicleInfo::whereIn('id',$sIds)->select('title')->get();
       $this->outputData['time'] = Time::whereIn('id',$tIds)->select('time','time_type')->get();
       
        return view('front.pages.single_product.index',$this->outputData);
    }

}
