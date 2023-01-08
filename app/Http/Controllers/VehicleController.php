<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Time;
use App\Models\Vehicle;
use App\Models\VehicleInfo;
use Illuminate\Http\Request;

class VehicleController extends Controller{
    
    const ControllerCode = "V_";
    public $outputData = [];

    public function detail($id){
        $objVehicle = Vehicle::where('random_id',$id)->first();

        $includeIds = Helper::explode($objVehicle->includes_ids);
        $includes = VehicleInfo::select('title')->whereIn('id',$includeIds)->get();

        $notIncludeIds = Helper::explode($objVehicle->highlight_ids);
        $notIncludes = VehicleInfo::select('title')->whereIn('id',$notIncludeIds)->get();

        $saftyGearIds = Helper::explode($objVehicle->tour->safety_gear_ids);
        $saftyGears = VehicleInfo::select('title')->whereIn('id',$saftyGearIds)->get();

        $refreshmentIds = Helper::explode($objVehicle->tour->refreshments_ids);
        $refreshments = VehicleInfo::select('title')->whereIn('id',$refreshmentIds)->get();

        $mustKnowIds = Helper::explode($objVehicle->warning_ids);
        $mustKnows = VehicleInfo::select('title')->whereIn('id',$mustKnowIds)->get();

        $addInfoIds = Helper::explode($objVehicle->additional_info_ids);
        $addInfos = VehicleInfo::select('title')->whereIn('id',$addInfoIds)->get();

        $extraActivityIds = Helper::explode($objVehicle->activities_ids);
        $extraActivitys = VehicleInfo::select('title')->whereIn('id',$extraActivityIds)->get();

        $timeIds = Helper::explode($objVehicle->tour->time_ids);
        $times = Time::select('time','time_type')->whereIn('id',$timeIds)->get();
        
        $this->outputData = [
            'objVehicle' => $objVehicle,
            'includes' => $includes,
            'notIncludes' => $notIncludes,
            'saftyGears' => $saftyGears,
            'refreshments' => $refreshments,
            'mustKnows' => $mustKnows,
            'addInfos' => $addInfos,
            'extraActivitys' => $extraActivitys,
            'times' => $times
        ];

        return view('front.pages.vehicle.detail',$this->outputData);
    }
}
